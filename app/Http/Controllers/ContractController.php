<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{ContratosBeneficiarios, DependentBeneficiaries, Beneficiaries, ContractDocument, TerminationTerm};
use App\Http\Services\{ProtocoloServices, ContratoServices};
use Illuminate\Support\Facades\{DB, Log};
use Carbon\Carbon;

class ContractController extends Controller
{
    public function __construct(
        private ProtocoloServices $protocoloServices,
        private ContratoServices $contratoServices
    ) {
    }

    public function store(Request $request)
    {
        $data_form = $request->all()["dataForm"];

        $beneficiario_contratante = $data_form[0];

        $beneficiario_contratante['protocolo_id'] = $this->protocoloServices->createProtocoloId();

        $beneficiario_contratante['data_nascimento'] = date('Y-m-d', strtotime($beneficiario_contratante['data_nascimento']));

        $beneficiario_contratante['data_expedicao'] = date('Y-m-d', strtotime($beneficiario_contratante['data_expedicao']));

        $beneficiaries = Beneficiaries::create($beneficiario_contratante);

        $data = $this->formatData($data_form, $beneficiaries);

        $contract = ContratosBeneficiarios::create($data);

        $beneficiarios_dependentes = $data_form[2];

        $this->storeBeneficiariosDependentes($beneficiarios_dependentes, $contract, $beneficiaries);

        $pdf = $this->createPDF($contract, 'contrato');

        if ($contract->save()) {
            return new ContractResource($contract);
        }
    }

    public function update(Request $request, $id)
    {
        $data_form = $request->all()["dataForm"];

        $beneficiario_contratante = $data_form[0];

        // Log::info($beneficiario_contratante);
        // Log::info($id);

        // $beneficios_adicionais = $data_form[1]["beneficio_adicional"];

        // $beneficiarios_dependentes = $data_form[2];

        $beneficiaries = Beneficiaries::where('id', $id)->update($beneficiario_contratante);

        // $beneficiaries->save();

        // Log::info($beneficiaries);

        // $contract = ContratosBeneficiarios::find($id);

        response()->json(['success' => 'success'], 200);
    }

    protected function storeBeneficiariosDependentes($dep, $contract, $beneficiaries)
    {
        $dependent_format = $this->contratoServices->formatDependentes($dep);

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

        Log::info(json_encode($file));

        return response()->download(public_path('/pdf/' . $file[0]->file_name));
    }

    public function getContract($id)
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
        $fileName = Str::replace(" ", "_", Carbon::now()) . '.pdf';

        $pdf = \PDF::loadView('templates.' . $name, $info->getOriginal())
            ->save(public_path('/pdf/' . $fileName));

        ContractDocument::create([
            'contrato_id' => $info->id,
            'file_name' => $fileName
        ]);

        return $pdf->download('pdf_file.pdf');
    }
}
