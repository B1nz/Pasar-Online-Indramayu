<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EditController extends Controller
{
    public function index()
    {
        $keranjangItems = \Cart::session(auth()->id())->getContent();

        $userData = User::where('id', auth()->id())->get();

        return view('auth.edit', compact('keranjangItems', 'userData'));
    }

    public function update(Request $request){
        //validation rules

        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',
            'alamat'=>'required|min:10|string|max:255',
            'no_hp'=>'required|min:10|string|max:255'
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->alamat = $request['alamat'];
        $user->no_hp = $request['no_hp'];

        if(!empty($request['password'])) {
            $user->password = $request['password'];
        }

        $user->save();

        Alert::success('Sukses!', 'Profile Anda Berhasil Di Simpan!');

        return redirect()->route('home');
    }

}
