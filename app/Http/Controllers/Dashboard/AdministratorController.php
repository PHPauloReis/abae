<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministratorRequest;
use App\Http\Requests\AdministratorEditRequest;
use App\Repositories\AdministratorRepository;
use Illuminate\Database\Eloquent\Concerns\HasGlobalScopes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    protected $administratorRepository;
    protected $request;

    public function __construct(AdministratorRepository $administratorRepository, Request $request)
    {
        $this->administratorRepository = $administratorRepository;
        $this->request = $request;
    }

    private function getUserRoles()
    {
        $userRoles = [
            '' => '---',
            9 => 'Administrador Master',
            2 => 'Operador',
        ];

        return $userRoles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = $this->administratorRepository->paginate(10);

        return view('administrator.index', compact('administrators'));
    }

    public function search()
    {
        $data = $this->request->get('keywords');
        $administrators = $this->administratorRepository->search($data);

        return view('administrator.index', compact('administrators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRoles = $this->getUserRoles();
        return view('administrator.create', compact('userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministratorRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->get('password'));

        try {
            $this->administratorRepository->insert($data);

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
        $administrator = $this->administratorRepository->find($id);
        $userRoles = $this->getUserRoles();

        return view('administrator.edit', compact('administrator', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministratorEditRequest $request, $id)
    {
        $data = $request->all();

        try {
            /**
             * Verifica se a senha foi informada:
             * Caso não tenha sido informada, remove a mesma do array data
             */
            if(empty($request->get('password'))) {
                unset($data['password']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }

            $administrator = $this->administratorRepository->find($id);
            $administrator->fill($data);
            $administrator->save();

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
            $administrator = $this->administratorRepository->find($id);
            $administrator->delete();

            $this->request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $this->request->session()->flash('error', 'Ocorreu um erro ao tentar excluir este registro: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
