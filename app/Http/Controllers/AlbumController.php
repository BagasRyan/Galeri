<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $database = DB::table('album')->get();

        // foreach($database as $data){
        // $gambar = $data->nama.$data->thumbnail;
        // }

        return view('dashboard', compact('database'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $database = DB::table('album')->get();
        return view('album.create', compact('database'));
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
            'thumb' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        $albumName = $request->name;
        $file = $request->thumb;
        $fileName = $file->getClientOriginalName();

        $file->move('storage/thumbnail', $fileName);

        DB::table('album')->insert([
            'nama' => $albumName,
            'thumbnail' =>  $fileName,
            'description' => $request->description
        ]);

        return redirect('/')->with('tambah', 'Album berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

        //$sql = "SELECT gambar.gambar, album.nama, gambar.created_at FROM `gambar` JOIN album ON gambar.album_id = album.id";

        $database = DB::table('gambar')
                    ->join('album', 'gambar.album_id', '=', 'album.id')
                    ->select('gambar.gambar', 'gambar.created_at', 'album.nama')
                    ->get();

        // $database = DB::select($sql);

        return view('view', compact('database'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = DB::table('album')->where('id',$id)->value('nama');
        $thumbnail = DB::table('album')->where('id',$id)->value('thumbnail');
        $gambar = DB::table('gambar')->where('album_id',$id)->value('gambar');

        File::delete('storage/thumbnail/'.$thumbnail);
        File::delete('storage/'.$gambar);

        DB::table('album')->where('id',$id)->delete();
        DB::table('gambar')->where('album_id',$id)->delete();
 
        return redirect('/')->with('hapus', 'Album Berhasil dihapus');
    }
}
