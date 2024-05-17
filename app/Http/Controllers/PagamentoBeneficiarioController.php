<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagamentoBeneficiario;
use App\Models\Beneficiaries;
use Illuminate\Support\Facades\DB;

class PagamentoBeneficiarioController extends Controller
{
    public function index(Request $request)
    {
        $pagamentos = PagamentoBeneficiario::query()->when(
            $request->input('search'),
            function ($query, $search) {
                $query->where('indentificacao', 'like', '%' . $search . '%')
                    ->OrWhere('name', 'like', '%' . $search . '%')
                    ->OrWhere('type', 'like', '%' . $search . '%');
            }
        )->paginate(8);

        return response()->json($pagamentos, 204);
    }

    function searchBeneficiarioPagamento(Request $request)
    {
        $query = DB::table("beneficiarios as b")
            ->leftJoin('pagamentos as p', 'b.id', '=', 'p.beneficiario_id');

        if ($request->input('search')) {
            $search = $request->input('search');

            $query->where('b.nome_completo', 'like', '%' . $search . '%')
                ->OrWhere('b.cpf', 'like', '%' . $search . '%');
        }

        $query->select(
            'b.nome_completo',
            'p.protocolo_id',
            'p.date_due',
            'p.date_payment',
            'p.value',
            'p.duplicate',
            'p.collector',
        );

        $pagamentos = $query->paginate(10);

        return $pagamentos;
    }
}
