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

Route::controller(ContratoBeneficiarioController::class)->prefix('beneficiario')->group(function () {
    Route::get('', 'index');
    Route::post('/contrato/store', 'store');
    Route::post('/store', 'store');
    Route::get('/{id}', 'getBeneficiario');
    Route::get('/dependentes/{id}', 'getDependentes');
    Route::get('/contrato/{id}', 'getContrato');
    Route::get('/historico/{id}', 'getHistoricoBeneficiario');
    Route::get('/contrato/download/{id}', 'download');
});

Route::controller(PagamentoBeneficiarioController::class)->group(function () {
    Route::get('pagamento', 'searchBeneficiarioPagamento');
});

Route::controller(PlansController::class)->prefix('planos')->group(function () {
    Route::get('', 'index');
    Route::post('/store', 'store');
    Route::put('/update/{id}', 'update');
    Route::get('/get-all', 'getAllPlans');
    Route::get('/get-plan/{id}', 'getPlan');
    Route::get('/get-additional-benefits/{id}', 'getAdditionalBenefits');
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

// Route::controller(ContractController::class)->group(function () {
//     Route::post('contract/store', 'store');
//     Route::put('contract/update/{id}', 'update');
//     Route::post('contract/create-termination-term', 'createTerminationTerm');
//     Route::get('get-contract/{id}', 'getContract');
//     Route::get('contract/download/{id}', 'download');
// });