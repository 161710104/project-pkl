<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Berita;
use App\User;
use Auth;
use Laratrust\LaratrustFacade as Laratrust;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Berita $berita)
    {
        $berita = Berita::paginate(8);
        if(Laratrust::hasRole('admin')){
            return view('berita.index',compact('berita'));
        }
        else if(Laratrust::hasRole('member')){
            $berita = Auth::user()->Berita()->paginate(10);
            $jumlah_data = count($berita['Berita']);
            return view('member.berita.index', compact('jumlah_data','berita'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $berita = Berita::all();
        $user = User::all();
        if(Laratrust::hasRole('admin')){
            return view('berita.create',compact('berita','user'));
        }
        else if(Laratrust::hasRole('member')){
            $berita = Auth::user()->Berita()->paginate(10);
            $jumlah_data = count($berita['Berita']);
            return view('member.berita.create', compact('berita', 'jumlah_data','user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'user_id'=>'max:255|required',


        ]);

         $beritas = new Berita;
         $beritas->judul = $request->judul;
         $beritas->isi = $request->isi;
         $beritas->user_id = $request->user_id;
         if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $beritas->gambar = $filename;
        }
         $beritas->save();
        return redirect()->route('beritas.index');
    }

    /**
     * Display the specified resource.
        *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = Berita::findOrFail($id);
        return view('berita.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Berita::findOrFail($id);
        return view('berita.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'isi' => 'required',


        ]);

         $beritas = Berita::findOrFail($id);
         $beritas->judul = $request->judul;
         $beritas->isi = $request->isi;
         if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $beritas->gambar = $filename;
        }
         $beritas->save();
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Berita::findOrFail($id);
        $a->delete();
        return redirect()->route('berita.index');
   
    }
}
