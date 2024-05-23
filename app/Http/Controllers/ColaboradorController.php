<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{Hash, Log};
use App\Models\{ContratoColaborador, Colaborador, ColaboradorDependentes, User};
use App\Http\Services\{ProtocoloServices, ContratoServices};
use PhpParser\Node\Expr\FuncCall;

class ColaboradorController extends Controller
{
    public function __construct(
        private ProtocoloServices $protocoloServices,
        private ContratoServices $contratoServices
    ) {
    }

    public function index(Request $request)
    {
        $query = DB::table("colaborador as c")
            ->leftJoin('contrato_colaborador as cc', 'c.id', '=', 'cc.colaborador_id');
        // ->leftJoin('plans as p', 'c.selecione_plano', '=', 'p.id');

        if ($request->input('search')) {
            $search = $request->search;

            $query->where('c.nome_completo', 'like', '%' . $search . '%')
                ->OrWhere('c.cpf', 'like', '%' . $search . '%');
        }

        $query->select(
            'c.id',
            'c.protocolo_id',
            'c.nome_completo',
            'c.cpf',
            'cc.remuneracao',
            // 'cc.ferias',
            'cc.carga_horaria',
        );

        $colaborador = $query->paginate(10);

        return $colaborador;
    }

    public function store(Request $request)
    {
        $colaborador = $request->all()["dataForm"];

        $colaborador['data_nascimento'] = date('Y-m-d', strtotime($colaborador['data_nascimento']));

        $colaborador['data_expedicao'] = date('Y-m-d', strtotime($colaborador['data_expedicao']));

        $colaborador['data_pagamento'] = date('Y-m-d', strtotime($colaborador['data_pagamento']));

        $colaborador['protocolo_id'] = $this->protocoloServices->createProtocoloId();

        $user = User::create([
            'name' => $colaborador['nome_completo'],
            'password' => Hash::make($colaborador['password']),
            'email' => $colaborador['email']
        ]);

        $colaborador['user_id'] = $user->id;

        $novo_colaborador = Colaborador::create($colaborador);

        // $data = $this->formatData($colaborador, $colaborador);

        $colaborador['colaborador_id'] = $novo_colaborador->id;

        $contrato_colaborador = ContratoColaborador::create($colaborador);

        $dependentes = $colaborador['dependentes'];

        $this->storeColaboradorDependentes($dependentes, $novo_colaborador);

        // $pdf = $this->createPDF($contrato_colaborador, 'contrato');

        if ($contrato_colaborador->save()) {
            return $contrato_colaborador;
        }
    }

    public function getColaborador($id)
    {
        $colaborador = Colaborador::where("id", $id)->get();

        return $colaborador;
    }

    public function getDependentes($id)
    {
        $dependente = ColaboradorDependentes::where("colaborador_id", $id)->get();

        return $dependente;
    }

    public function getContrato($id) {
        $contrato_colaborador = ContratoColaborador::where("colaborador_id", $id)->get();

        return $contrato_colaborador;
    }

    protected function storeColaboradorDependentes($dep, $colaborador)
    {
        $format = $this->contratoServices->formatDependentes($dep);

        foreach ($format as $key => $value) {
            $value += [
                "colaborador_id" => $colaborador->id,
            ];

            ColaboradorDependentes::create($value);
        }
    }
}
