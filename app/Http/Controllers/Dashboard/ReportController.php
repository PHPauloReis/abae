<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\ChartOfAccountRepository;
use App\Repositories\ContributionRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\FinancialTransactionRepository;
use App\Services\ActivityLocationService;
use App\Services\WeekdayService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $request;
    private $customerRepository;
    private $contributionRepository;
    private $chartOfAccountRepository;
    private $financialTransactionRepository;
    private $weekdayService;
    private $activityLocationService;

    public function __construct(
        Request $request,
        CustomerRepository $customerRepository,
        ContributionRepository $contributionRepository,
        ChartOfAccountRepository $chartOfAccountRepository,
        FinancialTransactionRepository $financialTransactionRepository,
        WeekdayService $weekdayService,
        ActivityLocationService $activityLocationService
    )
    {
        $this->request = $request;
        $this->customerRepository = $customerRepository;
        $this->contributionRepository = $contributionRepository;
        $this->chartOfAccountRepository = $chartOfAccountRepository;
        $this->financialTransactionRepository = $financialTransactionRepository;
        $this->weekdayService = $weekdayService;
        $this->activityLocationService = $activityLocationService;
    }

    public function customer()
    {
        // Carrega todos os tipos de sexo
        $gender = ['' => '---', 'm' => 'Masculino', 'f' => 'Feminino'];

        // Carrega os dias da semana para listar no formulário
        $weekdays = $this->weekdayService->getDays();

        // Carrega os locais de atividade
        $activityLocation = $this->activityLocationService->getLocations();

        return view('dashboard.report.customer', compact('gender', 'weekdays', 'activityLocation'));
    }

    public function searchCustomer()
    {
        // Carrega todos os tipos de sexo
        $gender = ['' => '---', 'm' => 'Masculino', 'f' => 'Feminino'];

        // Carrega os dias da semana para listar no formulário
        $weekdays = $this->weekdayService->getDays();

        // Carrega os locais de atividade
        $activityLocation = $this->activityLocationService->getLocations();

        // Carrega os dados enviados por get da QueryString
        $data = $this->request->all();

        $customersCollection = $this->customerRepository->advancedSearch($data);

        return view('dashboard.report.customer', compact('gender', 'weekdays', 'activityLocation', 'customersCollection'));
    }

    public function constribution()
    {
        return view('dashboard.report.constribution');
    }

    public function searchContribution()
    {
        // ...
    }

    public function financialTransactionToPay()
    {
        return view('dashboard.report.financialTransaction');
    }

    public function searchFinancialTransactionToPay()
    {
        // ...
    }

    public function financialTransactionToReceive()
    {
        return view('dashboard.report.financialTransaction');
    }

    public function searchFinancialTransactionToReceive()
    {
        // ...
    }
}
