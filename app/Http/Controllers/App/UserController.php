<?php

namespace App\Http\Controllers\App;

use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('app.index')->with(['user' => $user]);
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('app.user.profile', compact('user'));
    }


    public function updateProfile(UpdateUserRequest $request)
    {
        $user = auth()->user();
        if($request->get('password') != ''):
            $user->password = bcrypt($request->get('password'));
        endif;
        $user->name = $request->get('name');
        $user->surnames = $request->get('surnames');
        $user->nif = $request->get('nif');
        $user->phone = $request->get('phone');
        $user->nickname = $request->get('nickname');
        $user->address = $request->get('address');
        $user->locality = $request->get('locality');
        $user->province = $request->get('province');
        $user->country = $request->get('country');
        $user->post_code = $request->get('post_code');
        $user->default_percentage = $request->get('default_percentage');
        $user->save();

        Session::flash('message', 'Tu perfil se ha actualizado correctamente!');
        return redirect()->route('app.index');
    }

    public function settings(){
        $user = auth()->user();
        return view('app.user.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user();
        $user->pdf_color = $request->get('pdf_color');
        $user->show_logo = ($request->get('show_logo')) ? true : false;
        $user->save();
        Session::flash('message', 'Los ajustes se han actualizado correctamente!');
        return redirect()->route('settings');
    }
}
