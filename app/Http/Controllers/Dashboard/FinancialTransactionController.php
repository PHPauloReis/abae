<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\FinancialTransactionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\FinancialTransactionRepository;
use App\Repositories\ChartOfAccountRepository;

class FinancialTransactionController extends Controller
{
    private $financialTransactionRepository;
    private $chartOfAccountRepository;
    private $request;

    public function __construct(
        FinancialTransactionRepository $financialTransactionRepository,
        ChartOfAccountRepository $chartOfAccountRepository,
        Request $request
    )
    {
        $this->financialTransactionRepository = $financialTransactionRepository;
        $this->chartOfAccountRepository = $chartOfAccountRepository;
        $this->request = $request;
    }

    public function index() {}

    public function indexPayable()
    {
        $financialTransactions = $this->financialTransactionRepository->getPayables();

        return view('dashboard.financialTransaction.index', compact('financialTransactions'));
    }

    public function indexReceivable()
    {
        $financialTransactions = $this->financialTransactionRepository->getReceivable();

        return view('dashboard.financialTransaction.index', compact('financialTransactions'));
    }

    public function search()
    {
        $data = $this->request->get('keywords');

        $financialTransaction = $this->financialTransactionRepository->search($data, 3);

        return view('dashboard.financialTransaction.index', compact('financialTransaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chartOfAccount = $this->chartOfAccountRepository->all()->pluck('title', 'id')->toArray();
        array_unshift($chartOfAccount, '---');

        $type = ['' => '---', 1 => 'Receita', 2 => 'Despesa'];

        return view('dashboard.financialTransaction.create', compact('chartOfAccount', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinancialTransactionRequest $request)
    {
        $data = $this->request->all();

        try {
            $this->financialTransactionRepository->insert($data);

            $this->request->session()->flash('success', 'Registro gravado com sucesso!');
        } catch(\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar gravar esse registro!' . $e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $financialTransaction = $this->financialTransactionRepository->find($id);
        $type = ['' => '---', 1 => 'Receita', 2 => 'Despesa'];
        $chartOfAccount = $this->chartOfAccountRepository->all()->pluck('title', 'id')->toArray();

        return view('dashboard.financialTransaction.edit', compact('financialTransaction', 'type', 'chartOfAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinancialTransactionRequest $request, $id)
    {
        $data = $this->request->all();

        try {
            $financialTransaction = $this->financialTransactionRepository->find($id);
            $financialTransaction->fill($data);
            $financialTransaction->save();

            $this->request->session()->flash('success', 'Registro atualizado com sucesso!');
        } catch(\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar esse registro!');
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
            $financialTransaction = $this->financialTransactionRepository->find($id);
            $financialTransaction->delete();

            $this->request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch(\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esse registro!');
        }

        return redirect()->back();
    }
}
