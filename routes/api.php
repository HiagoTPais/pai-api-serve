<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BeneficiariesController,
    ContractController,
    PlansController,
    PaymentHistoryController,
    AuthController,
    ColaboradorController,
    ContratoColaboradorController,
    PagamentoBeneficiarioController,
    ContratoBeneficiarioController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::group(['prefix' => 'contrato'], function () {
    Route::post('/store', [ContractController::class, 'store']);
    Route::put('/update/{id}', [ContractController::class, 'update']);
    Route::post('/termination-term', [ContractController::class, 'createTerminationTerm']);
    Route::get('/get/{id}', [ContractController::class, 'getContract']);
    Route::get('/download/{id}', [ContractController::class, 'download']);
});
*/

Route::post('me', [AuthController::class, 'me']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);


Route::controller(ContratoColaboradorController::class)->group(function () {
    Route::get('contrato-colaborador', 'index');
    Route::post('contrato-colaborador/store', 'store');
    Route::get('colaborador', 'index');
    Route::post('colaborador/store', 'store');
    Route::get('colaborador/{id}', 'getColaborador');
    Route::get('colaborador/dependentes/{id}', 'getDependentes');
    Route::get('colaborador/contrato/{id}', 'getContrato');
});

Route::controller(ContratoBeneficiarioController::class)->group(function () {
    Route::get('contrato-beneficiario', 'index');
    Route::post('contrato-beneficiario/store', 'store');
    Route::get('beneficiario', 'index');
    Route::post('beneficiario/store', 'store');
    Route::get('beneficiario/{id}', 'getBeneficiario');
    Route::get('beneficiario/dependentes/{id}', 'getDependentes');
    Route::get('beneficiario/contrato/{id}', 'getContrato');
});


// Route::controller(ColaboradorController::class)->group(function () {
//     Route::get('colaborador', 'index');
//     Route::post('colaborador/store', 'store');
//     Route::get('colaborador/{id}', 'getColaborador');
//     Route::get('colaborador/dependentes/{id}', 'getDependentes');
//     Route::get('colaborador/contrato/{id}', 'getContrato');
// });

// Route::controller(BeneficiariesController::class)->group(function () {
//     Route::get('beneficiaries', 'index');
//     Route::delete('beneficiary/{id}', 'deleteBeneficiary');
//     Route::get('get-beneficiary/{id}', 'getBeneficiary');
//     Route::get('reset-beneficiary/{id}', 'resetBeneficiary');
//     Route::get('get-dependent/{id}', 'getDependent');
//     Route::get('get-historico-beneficiario/{id}', 'getHistoricoBeneficiario');
// });

Route::controller(PagamentoBeneficiarioController::class)->group(function () {
    Route::get('pagamento', 'searchBeneficiarioPagamento');
});

// Route::controller(ContractController::class)->group(function () {
//     Route::post('contract/store', 'store');
//     Route::put('contract/update/{id}', 'update');
//     Route::post('contract/create-termination-term', 'createTerminationTerm');
//     Route::get('get-contract/{id}', 'getContract');
//     Route::get('contract/download/{id}', 'download');
// });

Route::controller(PlansController::class)->group(function () {
    Route::get('plans', 'index');
    Route::post('plans/store', 'store');
    Route::put('plans/update/{id}', 'update');
    Route::get('plans/get-all', 'getAllPlans');
    Route::get('plans/get-plan/{id}', 'getPlan');
    Route::get('plans/get-additional-benefits/{id}', 'getAdditionalBenefits');
});
