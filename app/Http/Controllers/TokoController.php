<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Mail\ShopActivationRequest;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Save to db
        $toko = auth()->user()->toko()->create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        // Send mail to admin

        $admins = User::whereHas('role', function($q){
            $q->where('name','admin');
        })->get();

        Mail::to($admins)->send(new ShopActivationRequest($toko));

        Alert::success('Pengajuan Berhasil!', 'Mohon tunggu anda akan mendapkan email saat toko anda sudah di konfirmasi');

        return redirect()->route('home')->with('msg','Pengajuan Membuka Toko Terkirim!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        dd($toko->owner->nama. 'selamat datang', $toko->nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        //
    }
}
