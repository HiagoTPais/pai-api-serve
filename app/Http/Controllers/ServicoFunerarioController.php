<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{
    CuidadosFunerario,
    PagamentosFunerario,
    ProdutosFunerario,
    ServicoFunerario,
    Beneficiaries,
    Translado
};

class ServicoFunerarioController extends Controller
{
    public function index(Request $request)
    {
        $servicos =  DB::table("servico_funerario as sf")
            ->select(
                "b.nome_completo as responsavel",
                "sf.nome_falecido as felecido",
                "sf.peso as peso",
                "sf.altura as altura",
                "sf.local as local",
                "sf.jazigo as jazigo",
                "sf.data_hora_sepultamento as data_hora_sepultamento",
                "sf.hora_data_inicio as data_hora_obito",
                "sf.hora_data_termino as data_hora_atendimeto"
            )
            ->leftJoin('beneficiarios as b', 'b.id', '=', 'sf.responsavel_beneficiario_id')->get();

        return $servicos;
    }

    public function store(Request $request)
    {
        $request = $request->all()['dataForm'];

        $produtosFunerario = $request[3];
        $transladoInfo = $request[2];

        $servicoFunerario = array_merge(
            $request[1],
            $request[4],
            $request[5],
            $request[6],
            $request[7]
        );

        $servico_funerario = ServicoFunerario::create($servicoFunerario);

        $produtosFunerario['servico_funerario_id'] = $servico_funerario->id;
        $transladoInfo['servico_funerario_id'] = $servico_funerario->id;

        // $produtos_funerario = ProdutosFunerario::create($produtosFunerario);

        // $translado = Translado::create($transladoInfo);

        return $servico_funerario;
    }

    public function storeNovo(Request $request)
    {
        if ($request->tabela == "Salão de Homenagem") {
            DB::table("salao_homenagem")->insert([
                "nome" => $request->item,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        }

        if ($request->tabela == "Local de Seputamento") {
            DB::table("local_seputamento")->insert([
                "nome" => $request->item,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function getSalao()
    {
        $salao = DB::table("salao_homenagem")->get();

        return $salao;
    }

    public function getCopeira()
    {
        $copeira = DB::table("colaborador")->get();

        return $copeira;
    }

    public function getLocalSepultamento()
    {
        $local_seputamento = DB::table("local_seputamento")->get();

        return $local_seputamento;
    }

    public function getServico(Request $request)
    {
        $beneficiario = Beneficiaries::where('nome_completo', 'like', '%' . $request->input('nome_completo') . '%')
            ->OrWhere('cpf', 'like', '%' . $request->input('cpf') . '%')->first();

        // $servico_funerario = ServicoFunerario::where('falecido_beneficiario_id', $beneficiario->id)->first();

        $servico_funerario =  DB::table("servico_funerario as sf")
            ->select(
                "b.nome_completo as responsavel",
                "sf.nome_falecido as felecido",
                "sf.local as local",
                "sf.jazigo as jazigo",
                "sf.data_hora_sepultamento as data_hora_sepultamento"
            )
            ->join('beneficiarios as b', 'b.id', '=', 'sf.responsavel_beneficiario_id')
            ->where('sf.falecido_beneficiario_id', $beneficiario->id)->get();

        return $servico_funerario;
    }

    public function getServicoFunerario(Request $request)
    {
        $servico_funerario = ServicoFunerario::where('id', $request->id)->first();

        return $servico_funerario;
    }
}
