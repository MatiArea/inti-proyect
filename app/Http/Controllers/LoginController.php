<?php

namespace App\Http\Controllers;

use PDF;
use Image;
use App\Models\Item;
use App\Models\Egreso;
use App\Models\ItemEgreso;
use Illuminate\Http\Request;
use App\Models\Image as Logo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $hashed = md5($request->password);

        $user = User::whereAnd('username', $request->username)
            ->where('password', $hashed)
            ->first();

        if ($user) {
            session(['user' => $user]);
            return redirect('/inicio');
        } else {
            return redirect('/')->with(
                'error',
                'Usuario o contraseña incorrectos'
            );
        }
    }
}
