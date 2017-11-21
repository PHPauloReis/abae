<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AbstractPasswordController;
use Illuminate\Support\Facades\Auth;

class PasswordController extends AbstractPasswordController
{
    public function editPassword()
    {
        $id = Auth::user()->id;

        $administrator = $this->administratorRepository->find($id);
        $route = 'dashboard.administrator.updatePassword';
        $template = 'layouts.dashboard';

        return view('administrator.editPassword', compact('administrator', 'route', 'template'));
    }
}
