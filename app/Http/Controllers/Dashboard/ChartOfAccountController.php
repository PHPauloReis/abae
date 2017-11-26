<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\ChartOfAccountRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ChartOfAccountRepository;

class ChartOfAccountController extends Controller
{
    private $chartOfAccountRepository;
    private $request;

    public function __construct(ChartOfAccountRepository $chartOfAccountRepository, Request $request)
    {
        $this->chartOfAccountRepository = $chartOfAccountRepository;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartOfAccount = $this->chartOfAccountRepository->paginate(10);

        return view('dashboard.chartOfAccount.index', compact('chartOfAccount'));
    }

    public function search()
    {
        $data = $this->request->get('keywords');

        $chartOfAccount = $this->chartOfAccountRepository->search($data, 3);

        return view('dashboard.chartOfAccount.index', compact('chartOfAccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.chartOfAccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartOfAccountRequest $request)
    {
        $data = $this->request->all();

        try {
            $this->chartOfAccountRepository->insert($data);

            $this->request->session()->flash('success', 'Registro gravado com sucesso!');
        } catch(\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar gravar esse registro!');
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
        $chartOfAccount = $this->chartOfAccountRepository->find($id);

        return view('dashboard.chartOfAccount.edit', compact('chartOfAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChartOfAccountRequest $request, $id)
    {
        $data = $this->request->all();

        try {
            $chartOfAccount = $this->chartOfAccountRepository->find($id);
            $chartOfAccount->fill($data);
            $chartOfAccount->save();

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
            $chartOfAccount = $this->chartOfAccountRepository->find($id);
            $chartOfAccount->delete();

            $this->request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch(\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esse registro!');
        }

        return redirect()->back();
    }
}
