<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return redirect('dashboard/');
});

// Grupo de todas Dashboard

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'can:access-erp']], function() {

    // Rota padrão
    Route::get('/', function() {
        return redirect()->route('customer.index');
    });

    Route::get('/forbiden', function() {
        return view('dashboard.errors.403');
    })->name('forbiden');

    // Clientes
    Route::get('customer/search', ['as' => 'customer.search', 'uses' => 'Dashboard\CustomerController@search']);
    Route::get('customer/downed', ['as' => 'customer.downed', 'uses' => 'Dashboard\CustomerController@listDowned']);
    Route::get('customer/downed/search', ['as' => 'customer.downed.search', 'uses' => 'Dashboard\CustomerController@searchDowned']);
    Route::resource('customer', 'Dashboard\CustomerController');
    Route::patch('customer/down/{id}', ['as' => 'customer.down', 'uses' => 'Dashboard\CustomerController@down']);

    // Contribuições
    Route::get('contribution/create/{id}', ['as' => 'contribution.create', 'uses' => 'Dashboard\ContributionController@create']);
    Route::post('contributions/store/{id}', ['as' => 'contribution.store', 'uses' => 'Dashboard\ContributionController@store']);
    Route::get('contribution/search-customers-wth-contribution', ['as' => 'contribution.searchCustomersWithContribution', 'uses' => 'Dashboard\ContributionController@searchCustomersWithContribution']);
    Route::get('contribution', ['as' => 'contribution.list.customers', 'uses' => 'Dashboard\ContributionController@listCustomersWithContribution']);
    Route::delete('contribution/{id}', ['as' => 'contribution.destroy', 'uses' => 'Dashboard\ContributionController@destroy']);

    // Planos de contas
    Route::get('chart_of_account/search', ['as' => 'chart_of_account.search', 'uses' => 'Dashboard\ChartOfAccountController@search']);
    Route::resource('chart_of_account', 'Dashboard\ChartOfAccountController');

    // Caixa
    Route::get('financial_transaction/payables', ['as' => 'financial_transaction.payables', 'uses' => 'Dashboard\FinancialTransactionController@indexPayable']);
    Route::get('financial_transaction/receivable', ['as' => 'financial_transaction.receivables', 'uses' => 'Dashboard\FinancialTransactionController@indexReceivable']);
    Route::resource('financial_transaction', 'Dashboard\FinancialTransactionController');

    // Relatórios
    Route::get('report/customer', ['as' => 'report.customer', 'uses' => 'Dashboard\ReportController@customer']);
    Route::get('report/customer/search', ['as' => 'report.customer.search', 'uses' => 'Dashboard\ReportController@searchCustomer']);

    Route::get('report/contribution', ['as' => 'report.contribution', 'uses' => 'Dashboard\ReportController@contribution']);
    Route::get('report/financial_transaction_to_pay', ['as' => 'report.financial_transaction_to_pay', 'uses' => 'Dashboard\ReportController@financial_transaction_to_pay']);
    Route::get('report/financial_transaction_to_receive', ['as' => 'report.financial_transaction_to_receive', 'uses' => 'Dashboard\ReportController@financial_transaction_to_receive']);

    // Administradores
    Route::get('administrator/search', ['as' => 'administrator.search', 'uses' => 'Dashboard\AdministratorController@search']);

    // Atualizar senha
    Route::get('administrator/update-password', ['as' => 'dashboard.administrator.editPassword', 'uses' => 'Dashboard\PasswordController@editPassword']);
    Route::put('administrator/update-password', ['as' => 'dashboard.administrator.updatePassword', 'uses' => 'Dashboard\PasswordController@updatePassword']);

    Route::resource('administrator', 'Dashboard\AdministratorController');

});

// Rotas de autenticação
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
