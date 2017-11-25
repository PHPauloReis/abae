<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\ContributionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ContributionRepository;
use App\Repositories\CustomerRepository;
use App\Services\MonthService;

class ContributionController extends Controller
{
    private $request;
    private $contributionRepository;
    private $customerRepository;
    private $monthService;

    public function __construct(
        Request $request,
        ContributionRepository $contributionRepository,
        CustomerRepository $customerRepository,
        MonthService $monthService
    )
    {
        $this->request = $request;
        $this->contributionRepository = $contributionRepository;
        $this->customerRepository = $customerRepository;
        $this->monthService = $monthService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCustomersWithContribution()
    {
        $customers = $this->customerRepository->getActiveWithContribution();

        return view('dashboard.contribution.listCustomers', compact('customers'));
    }

    public function searchCustomersWithContribution()
    {
        $data = $this->request->all();
        $customers = $this->customerRepository->searchCustomersWithContribution($data);

        return view('dashboard.contribution.listCustomers', compact('customers'));
    }

    public function search()
    {
        $data = $this->request->get('keywords');
        $customers = $this->customerRepository->search($data);

        return view('dashboard.customer.index', compact('customers'));
    }

    public function create($customerId)
    {
        $customer = $this->customerRepository->find($customerId);
        $contributions = $this->contributionRepository->getByCustomer($customerId);
        $months = $this->monthService->getMonths();

        return view('dashboard.contribution.contributionCreate', compact('customer', 'contributions', 'months'));
    }

    public function store(ContributionRequest $request, $customerId)
    {
        $data = $this->request->all();
        $data['customer_id'] = $customerId;

        try {
            $this->contributionRepository->insert($data);
            $request->session()->flash('success', 'Registro cadastrado com sucesso!');
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar cadastrar esse registro!');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $contribution = $this->contributionRepository->find($id);
            $contribution->delete();

            $this->request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar excluir este registro: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
