<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContributionRepository;
use App\Repositories\CustomerRepository;

class ContributionController extends Controller
{
    private $request;
    private $contributionRepository;
    private $customerRepository;

    public function __construct(
        Request $request,
        ContributionRepository $contributionRepository,
        CustomerRepository $customerRepository
    )
    {
        $this->request = $request;
        $this->contributionRepository = $contributionRepository;
        $this->customerRepository = $customerRepository;
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
        $contributions = $this->contributionRepository->getByCustomer($customerId);

        return view('dashboard.contribution.contributionCreate', compact('contributions'));
    }

    public function store()
    {

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
