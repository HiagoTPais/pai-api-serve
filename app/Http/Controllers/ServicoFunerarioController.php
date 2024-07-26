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
    Translado
};

class ServicoFunerarioController extends Controller
{
    public function index(Request $request)
    {
        $servicos = ServicoFunerario::query()->when(
            $request->input('search'),
            function ($query, $search) {
                $query->where('nome_completo', 'like', '%' . $search . '%');
            }
        )->paginate(8);

        return $servicos;
    }

    public function store(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $request = $request->all()['dataForm'];

        $cuidadosFunerario = $request[4];
        $pagamentosFunerario = $request[6];
        $produtosFunerario = $request[3];
        $transladoInfo = $request[2];
        $servicoFunerario = array_merge($request[1], $request[5], $request[7]);

        $servico_funerario = ServicoFunerario::create($servicoFunerario);

        $cuidadosFunerario['servico_funerario_id'] = $servico_funerario->id;
        $pagamentosFunerario['servico_funerario_id'] = $servico_funerario->id;
        $produtosFunerario['servico_funerario_id'] = $servico_funerario->id;
        $transladoInfo['servico_funerario_id'] = $servico_funerario->id;

        $cuidados_funerario = CuidadosFunerario::create($cuidadosFunerario);

        $pagamentos_funerario = PagamentosFunerario::create($pagamentosFunerario);

        $produtos_funerario = ProdutosFunerario::create($produtosFunerario);

        $translado = Translado::create($transladoInfo);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return array_merge(
            $servico_funerario,
            $cuidados_funerario,
            $pagamentos_funerario,
            $produtos_funerario,
            $translado
        );
    }

    public function storeNovo(Request $request)
    {
        // Log::info($request->all());

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

    public function getLocalSepultamento() {
        $local_seputamento = DB::table("local_seputamento")->get();

        return $local_seputamento;
    }
}
