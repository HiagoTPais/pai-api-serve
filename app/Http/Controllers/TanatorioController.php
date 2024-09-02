<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Tanatorio, RelatorioTanatorio, Materiais};
use Carbon\Carbon;

class TanatorioController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table("tanatorio as t");

        if ($request->input('search')) {
            $search = $request->search;

            $query->where('b.nome_completo', 'like', '%' . $search . '%');
        }

        $tanatorio = $query->paginate(10);

        return $tanatorio;
    }

    public function getTanatorio($id)
    {
        $tanatorio = Tanatorio::where('id', $id)->get();

        return $tanatorio;
    }

    public function store(Request $request)
    {
        $request = $request->all()['dataForm'];

        $tanatorio = array_merge(
            $request[0],
            $request[1],
            $request[2],
            $request[3],
            $request[4],
            $request[6]
        );

        $outrasRegioes =  $request[1]['outras_regioes'];

        $new_tanatorio = $this->gerarNewTanatorio($tanatorio);

        $tanatorio = Tanatorio::create($new_tanatorio);

        $this->createOutrasRegioes($outrasRegioes, $tanatorio);

        $this->createMaterias($request[5], $tanatorio);

        $pdf = $this->gerarRelatorio($tanatorio);

        return $tanatorio;
    }

    public function update(Request $request, $id)
    {
        $request = $request->all()['dataForm'];

        $tanatorio = array_merge(
            $request[0],
            $request[1],
            $request[2],
            $request[3],
            $request[4],
            $request[6]
        );

        $outrasRegioes =  $request[1]['outras_regioes'];

        $new_tanatorio = $this->gerarNewTanatorio($tanatorio);

        $tanatorio = Tanatorio::create($new_tanatorio);

        $this->createOutrasRegioes($outrasRegioes, $tanatorio);

        $this->createMaterias($request[5], $tanatorio);

        // $pdf = $this->gerarRelatorio($tanatorio);

        return $tanatorio;
    }

    public function gerarNewTanatorio($tanatorio)
    {
        $new_tanatorio = [];

        foreach ($tanatorio as $key => $value) {

            if (is_array($value)) {
                if (!empty($value) && isset($value[0])) {
                    $new_tanatorio[$key] = $value[0];
                }
            } else {
                $new_tanatorio[$key] = $value;
            }
        }

        return $new_tanatorio;
    }

    public function gerarRelatorio($tanatorio)
    {
        $relatorio = $this->createPDF($tanatorio, 'relatorio_tanatorio');

        return $relatorio;
    }

    public function getOutrosLocais($id)
    {
        $outros_regioes = DB::table('outras_regioes_corpo')->where('tanatorio_id', $id)->get();

        return $outros_regioes;
    }

    public function getMaterias($id)
    {
        $materiais = DB::table('materiais')->where('tanatorio_id', $id)->get();

        return $materiais;
    }

    public function createPDF($info, $name)
    {
        $arquivo = md5(Carbon::now()) . '.pdf';

        $pdf = \PDF::loadView('templates.' . $name, $info->getOriginal());

        $pdf->save('public/pdf/' . $arquivo);

        RelatorioTanatorio::create([
            'tanatorio_id' => $info->id,
            'arquivo' => $arquivo
        ]);

        return $pdf->download($arquivo);
    }

    public function download($id)
    {
        $file = DB::table('relatorio_tanatorio')->where('tanatorio_id', $id)->get();

        return response()->download(public_path('/pdf/' . $file[0]->arquivo));
    }

    public function createMaterias($materiais, $tanatorio)
    {
        DB::table("materiais")->where("tanatorio_id", $tanatorio->id)->delete();

        for ($i = 0; $i <  count($materiais) / 2; $i++) {
            Materiais::create([
                "tanatorio_id" => $tanatorio->id,
                "quantidade" =>  isset($materiais["quantidade_" . $i]) ? $materiais["quantidade_" . $i] : null,
                "produto" =>  isset($materiais["produto_servico_" . $i]) ? $materiais["produto_servico_" . $i] : null
            ]);
        }
    }

    public function getTanatorioInfo()
    {
        $atendimentos = DB::table("tanatorio")->count();
        $necropsiado = DB::table("tanatorio")->where("necropsiado", "Sim")->count();
        $normais = DB::table("tanatorio")->where("necropsiado", "Não")->count();
        $decomposicao = DB::table("tanatorio")->where("sinais_decomposicao", "Sim")->count();

        $n_idade = DB::table("tanatorio")
            ->select(DB::raw('count(idade) as n_idade'))
            ->whereNotNull("idade")
            ->groupBy('idade')
            ->get();

        $idade = DB::table("tanatorio")
            ->select('idade')
            ->whereNotNull("idade")
            ->groupBy('idade')
            ->get();

        return [
            "atendimentos" => $atendimentos,
            "necropsiado" => $necropsiado,
            "normais" => $normais,
            "decomposicao" => $decomposicao,
            "n_idade" => $n_idade,
            "idade" => $idade,
        ];
    }

    public function createOutrasRegioes($outrasRegioes, $tanatorio)
    {
        DB::table("outras_regioes_corpo")->where("tanatorio_id", $tanatorio->id)->delete();

        for ($i = 0; $i <  count($outrasRegioes) / 2; $i++) {
            DB::table("outras_regioes_corpo")->insert([
                "tanatorio_id" => $tanatorio->id,
                "local_corpo" => $outrasRegioes["regiao-" . $i],
                "presencade_secrecao" => isset($outrasRegioes["presencade_secrecao-" . $i]) ? $outrasRegioes["presencade_secrecao-" . $i] : null,
                "deterioracao" => isset($outrasRegioes["deterioracao-" . $i]) ? $outrasRegioes["deterioracao-" . $i] : null,
                "dilaceracao" => isset($outrasRegioes["dilaceracao-" . $i]) ? $outrasRegioes["dilaceracao-" . $i] : null,
                "amputado" => isset($outrasRegioes["amputado-" . $i]) ? $outrasRegioes["amputado-" . $i] : null,
                "inchaco" => isset($outrasRegioes["inchaco-" . $i]) ? $outrasRegioes["inchaco-" . $i] : null,
                "tecido_mole" => isset($outrasRegioes["tecido_mole-" . $i]) ? $outrasRegioes["tecido_mole-" . $i] : null,
                "odor" => isset($outrasRegioes["odor-" . $i]) ? $outrasRegioes["odor-" . $i] : null,
                "imagem" => isset($outrasRegioes["imagem-" . $i]) ? $outrasRegioes["imagem-" . $i] : null,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
