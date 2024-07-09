<?php

namespace App\Http\Controllers;

use App\Http\Resources\Plans as PlansResource;
use App\Http\Resources\AdditionalBenefitsResource;
use Illuminate\Support\Facades\{Log, DB};
use App\Http\Services\ContratoServices;
use Illuminate\Http\Request;
use App\Models\{Plans, AdditionalBenefits};

class PlansController extends Controller
{
    public function __construct(
        private ContratoServices $contratoServices
    ) {
    }

    public function index(Request $request)
    {
        $plans = Plans::query()->when(
            $request->input('search'),
            function ($query, $search) {
                $query->where('nome', 'like', '%' . $search . '%')
                    ->OrWhere('tipo', 'like', '%' . $search . '%');
            }
        )->paginate(8);

        return PlansResource::collection($plans);
    }

    public function store(Request $request)
    {
        $plan = Plans::create($request->all()['data']);

        $beneficio_adicional = $request->all()['data']['beneficio_adicional'];

        $this->storeBeneficiosAdicionais($beneficio_adicional, $plan->id);

        if ($plan->save()) {
            return $plan;
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all()['data'];

        Plans::where('id', $id)->update([
            'nome' => $data['nome'],
            'tipo' => $data['tipo'],
            'taxa_adesao' => $data['taxa_adesao'],
            'valor_plano_mes' => $data['valor_plano_mes'],
            'duracao_contrato' => $data['duracao_contrato'],
            'taxa_rescisao' => $data['taxa_rescisao'],
            'n_min' => $data['n_min'],
            'n_max' => $data['n_max'],
            'beneficiarios' => $data['beneficiarios'],
            'descricao' => $data['descricao'],
        ]);

        // if ($request->all()['data']['beneficio_adicional']) {
        //     $beneficio_adicional = $request->all()['data']['beneficio_adicional'];

        //     $this->updateBeneficiosAdicionais($beneficio_adicional, $id);
        // }

        // // response()->json(['error' => 'invalid'], 401);

        response()->json(['success' => 'success'], 200);
    }

    public function getAdditionalBenefits($id)
    {
        $additionalBenefits = AdditionalBenefits::where('plano_id', $id)->get();

        return $additionalBenefits;
    }

    public function getAllPlans()
    {
        $plans = Plans::all();

        return $plans;
    }

    public function getPlan($id)
    {
        $plan = Plans::where('id', $id)->get();

        return $plan;
    }

    protected function storeBeneficiosAdicionais($ben, $plano_id)
    {
        if ($ben) {
            $benefits_format = $this->contratoServices->formatPlanosBeneficios($ben);

            foreach ($benefits_format as $key => $value) {
                $value += ["plano_id" => $plano_id];

                if (!is_null($value['beneficio_adicional'])) {
                    AdditionalBenefits::create($value);
                }
            }
        }
    }

    protected function updateBeneficiosAdicionais($ben, $plano_id)
    {
        DB::table('additional_benefits')->where('plano_id', $plano_id)->delete();

        $this->storeBeneficiosAdicionais($ben, $plano_id);
    }
}
