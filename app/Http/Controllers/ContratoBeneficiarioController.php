<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{
    ContratosBeneficiarios,
    DependentBeneficiaries,
    Beneficiaries,
    BeneficiarioDocumento,
    TerminationTerm,
    HistoricoBeneficiario
};
use Illuminate\Support\Facades\{DB, Log};
use App\Http\Services\{ProtocoloServices, ContratoServices};
use Carbon\Carbon;

class ContratoBeneficiarioController extends Controller
{
    public function __construct(
        private ProtocoloServices $protocoloServices,
        private ContratoServices $contratoServices
    ) {
    }

    public function index(Request $request)
    {
        $query = DB::table("beneficiarios as b")
            ->leftJoin('contrato_beneficiario as cb', 'b.id', '=', 'cb.beneficiario_id')
            ->leftJoin('planos as p', 'cb.selecione_plano', '=', 'p.id');

        if ($request->input('search')) {
            $search = $request->search;

            $query->where('b.nome_completo', 'like', '%' . $search . '%')
                ->OrWhere('b.cpf', 'like', '%' . $search . '%');
        }

        $query->select(
            'b.id',
            'b.protocolo_id',
            'b.nome_completo',
            'b.cpf',
            'b.status',
            'p.nome',
            'p.duracao_contrato',
            'p.taxa_rescisao',
        );

        $beneficiarios = $query->paginate(10);

        return $beneficiarios;
    }

    public function store(Request $request)
    {
        $data_form = $request->all()["dataForm"];

        $beneficiario_contratante = $data_form[0];

        $beneficiario_contratante['protocolo_id'] = $this->protocoloServices->createProtocoloId();

        $beneficiaries = Beneficiaries::create($beneficiario_contratante);

        $data = $this->formatData($data_form, $beneficiaries);

        $contract = ContratosBeneficiarios::create($data);

        $beneficiarios_dependentes = $data_form[2];

        $this->storeBeneficiariosDependentes($beneficiarios_dependentes, $contract, $beneficiaries);

        $pdf = $this->createPDF($contract, 'contrato');

        if ($contract->save()) {
            response()->json($contract);
        }
    }

    public function update(Request $request, $id)
    {
        $data_form = $request->all()["dataForm"];

        $beneficiario_contratante = $data_form[0];

        $beneficiaries = Beneficiaries::where('id', $id)->update($beneficiario_contratante);

        response()->json($beneficiaries);
    }

    protected function storeBeneficiariosDependentes($dep, $contract, $beneficiaries)
    {
        // Log::info("beneficiarios_dependentes");
        // Log::info($dep);

        $dependent_format = $this->contratoServices->formatDependentes($dep);

        // Log::info("dependent_format");
        // Log::info($dependent_format);

        foreach ($dependent_format as $key => $value) {
            $value += [
                "beneficiario_id" => $beneficiaries->id,
                "contrato_id" => $contract->id
            ];

            DependentBeneficiaries::create($value);
        }
    }

    protected function formatData($data_form, $beneficiaries)
    {
        unset($data_form[2]);

        unset($data_form[1]["beneficio_adicional"]);

        unset($data_form[0]);

        foreach ($data_form as $item) {
            if (!is_null($item)) {
                foreach ($item as $key => $value) {
                    $data[$key] = $value;
                }
            }
        }

        $data += ["beneficiario_id" => $beneficiaries->id];

        return $data;
    }

    public function download($id)
    {
        $file = DB::table('beneficiario_documento')->where('contrato_id', $id)->get();

        return response()->download(public_path('/pdf/' . $file[0]->arquivo));
    }

    public function getContrato($id)
    {
        // $contract = DB::table("contract as c")->where('c.id', $id)->get();
        // $additional_benefits =  DB::table("additional_benefits as ab")->where('ab.contrato_id', $contract[0]->id)->get();

        $contract = ContratosBeneficiarios::where("beneficiario_id", $id)->get();

        return ContractResource::collection($contract);
    }

    public function createTerminationTerm(Request $request)
    {
        $terminationTerm = TerminationTerm::create([
            'motivo_cancelamento' => $request->motivo_cancelamento,
            'observacao_cancelamento' => $request->observacao_cancelamento,
            'beneficiario_id' => $request->beneficiary_id,
        ]);

        DB::table("beneficiaries")->where("id", $request->beneficiary_id)->update(["status" => "CANCELADO"]);

        $pdf = $this->createPDF($terminationTerm, 'termo_rescisao');

        return response()->json($terminationTerm, 204);
    }

    public function createPDF($info, $name)
    {
        $arquivo = Str::replace(" ", "_", Carbon::now()) . '.pdf';

        $pdf = \PDF::loadView('templates.' . $name, $info->getOriginal());

        // $pdf->save('public/pdf/' . $arquivo);

        // dd($pdf, $arquivo);

        BeneficiarioDocumento::create([
            'contrato_id' => $info->id,
            'arquivo' => $arquivo
        ]);

        return $pdf->download($arquivo);
    }

    public function getHistoricoBeneficiario($id)
    {
        // $historicoBeneficiario = HistoricoBeneficiario::where($id)->get();
        $historicoBeneficiario = HistoricoBeneficiario::all();

        return $historicoBeneficiario;
    }

    public function getBeneficiario($id)
    {
        $beneficiario = Beneficiaries::where("id", $id)->get();

        return $beneficiario;
    }

    public function getDependentes($id)
    {
        $dependentes = DependentBeneficiaries::where("beneficiario_id", $id)->get();

        return $dependentes;
    }
}
