<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Services\WeekdayService;
use App\Services\ActivityLocationService;

class CustomerController extends Controller
{
    protected $customerRepository;
    protected $weekdayService;
    protected $activityLocationService;
    protected $request;

    public function __construct(
        CustomerRepository $customerRepository,
        WeekdayService $weekdayService,
        ActivityLocationService $activityLocationService,
        Request $request
    )
    {
        $this->customerRepository = $customerRepository;
        $this->weekdayService = $weekdayService;
        $this->activityLocationService = $activityLocationService;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->getActive(10);
        return view('dashboard.customer.index', compact('customers'));
    }

    public function search()
    {
        $data = $this->request->get('keywords');
        $customers = $this->customerRepository->searchActive($data);

        return view('dashboard.customer.index', compact('customers'));
    }

    public function listDowned()
    {
        $customers = $this->customerRepository->getDowned(10);
        return view('dashboard.customer.listDowned', compact('customers'));
    }

    public function searchDowned()
    {
        $data = $this->request->get('keywords');
        $customers = $this->customerRepository->searchDowned($data);

        return view('dashboard.customer.listDowned', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Carrega os dias da semana para listar no formul??rio de cadastro
        $weekdays = $this->weekdayService->getDays();

        // Carrega os locais de atividade
        $activityLocation = $this->activityLocationService->getLocations();

        return view('dashboard.customer.create', compact('weekdays', 'activityLocation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();

        try {
            $this->customerRepository->insert($data);

            $request->session()->flash('success', 'Registro cadastrado com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar cadastrar este registro: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);

        // Carrega os dias da semana para listar no formul??rio de cadastro
        $weekdays = $this->weekdayService->getDays();

        // Carrega os locais de atividade
        $activityLocations = $this->activityLocationService->getLocations();

        return view('dashboard.customer.show', compact('customer', 'weekdays', 'activityLocations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Carrega os dias da semana para listar no formul??rio de cadastro
        $weekdays = $this->weekdayService->getDays();

        // Carrega os locais de atividade
        $activityLocation = $this->activityLocationService->getLocations();

        $customer = $this->customerRepository->find($id);

        return view('dashboard.customer.edit', compact('customer', 'weekdays', 'activityLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $data = $request->all();

        try {
            $customer = $this->customerRepository->find($id);
            $customer->fill($data);
            $customer->save();

            $request->session()->flash('success', 'Registro atualizado com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar este registro: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $customer = $this->customerRepository->find($id);
            $customer->delete();

            $this->request->session()->flash('success', 'Registro exclu??do com sucesso!');
        } catch (\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar excluir este registro: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function down($id)
    {
        try {
            $customer = $this->customerRepository->find($id);
            $customer->active = 'N';
            $customer->save();

            $this->request->session()->flash('success', 'Baixa realizada com sucesso!');
        } catch (\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar realizar a baixa desse registro!');
        }

        return redirect()->back();
    }
}
