<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministratorUpdatePasswordRequest;
use App\Repositories\AdministratorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

abstract class AbstractPasswordController extends Controller
{
    protected $administratorRepository;
    protected $request;

    public function __construct(AdministratorRepository $administratorRepository, Request $request)
    {
        $this->administratorRepository = $administratorRepository;
        $this->request = $request;
    }

    abstract public function editPassword();

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(AdministratorUpdatePasswordRequest $request)
    {
        $data = $request->all();

        try {
            $id = Auth::user()->id;

            if($this->oldPasswordVerify(Auth::user(), $data['old_password'])) {
                $data['password'] = Hash::make($data['password']);

                $administrator = $this->administratorRepository->find($id);
                $administrator->fill($data);
                $administrator->save();

                $request->session()->flash('success', 'Senha atualizada com sucesso!');
            } else {
                $request->session()->flash('error', 'A senha antiga informada não confere');    
            }
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar a sua senha: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    protected function oldPasswordVerify($user, $oldPassword)
    {
        return Hash::check($oldPassword, $user->password);
    }
}
