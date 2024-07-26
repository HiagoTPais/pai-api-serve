<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\{Beneficiaries, DependentBeneficiaries, HistoricoBeneficiario};
use App\Http\Resources\{Beneficiaries as BeneficiariesResource, Dependent as DependentResource};
use Illuminate\Support\Facades\DB;

class BeneficiariesController extends Controller
{
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

    public function search(Request $request)
    {
        Log::info($request->all());

        $query = Beneficiaries::with('dependentes');

        foreach ($request->all() as $key => $value) {
            if ($request->input($key)) {
                $query->where('beneficiarios.' . $key, 'like', '%' . $value . '%');
            }
        }

        $beneficiarios = $query->get();

        // $beneficiarios->map(function ($beneficiario) {
        //     $beneficiarios_dependentes = DB::table("beneficiarios_dependentes as bd")
        //         ->where("bd.beneficiario_id", $beneficiario->id)->get();

        //     $beneficiario->beneficiarios_dependentes = $beneficiarios_dependentes;
            
        //     return $beneficiario;
        // });

        Log::info($beneficiarios);

        return $beneficiarios;

        // $beneficiarios = Beneficiaries::with('dependentes')->get();
        
    }

    public function getBeneficiary($id)
    {
        $beneficiary = Beneficiaries::where("id", $id)->get();

        return BeneficiariesResource::collection($beneficiary);
    }

    public function getDependent($id)
    {
        $dependent = DependentBeneficiaries::where("beneficiario_id", $id)->get();

        return DependentResource::collection($dependent);
    }

    public function deleteBeneficiary($id)
    {
        $beneficiary = Beneficiaries::find($id);

        $beneficiary->delete();

        response()->json(['success' => 'success'], 200);
    }

    public function resetBeneficiary($id)
    {
        $beneficiary = Beneficiaries::find($id);

        $beneficiary->status = "ATIVO";

        $beneficiary->save();

        response()->json(['success' => 'success'], 200);
    }

    public function getHistoricoBeneficiario($id)
    {
        // $historicoBeneficiario = HistoricoBeneficiario::where($id)->get();
        $historicoBeneficiario = HistoricoBeneficiario::all();

        return $historicoBeneficiario;
    }
}
