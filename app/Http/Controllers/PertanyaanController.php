<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Pertanyaan;
use App\Jawaban;
use App\Tag;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pertanyaan::all();

        return view('pertanyaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.form');
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
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $tag_arr = explode(',', $request->tags);

        $tag_ids = [];
        foreach ($tag_arr as $tag_name) {
            $tag = Tag::firstOrCreate('tag_name', $tag_name);
            $tag_ids[] = $tag->id;
        }



        $user = Auth::user();

        $post = Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'user_id' => Auth::user()->id
        ]);

        $post->tags()->sync($tag_ids);

        $user = Auth::user();
        $user->pertanyaan_sya()->save($post);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pertanyaan::find($id);
        $jawab = Jawaban::where('pertanyaan_id', $id)->get();
        // dd($jawab);
        return view('pertanyaan.show', compact(['data', 'jawab']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::table('pertanyaan')->where('id', $id)->first();

        return view('pertanyaan.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $query = DB::table('pertanyaan')
            ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'user_id' => Auth::user()->id,
            ]);

        return redirect('/pertanyaan/' . $id)->with('success', 'Pertanyaan berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = DB::table('jawabans')->where('pertanyaan_id', $id)->delete();
        $post = DB::table('pertanyaan')->where('id', $id)->delete();
        return redirect('/pertanyaan')->with('success', 'pertanyaan berhasil di hapus');
    }

    public function my_index()
    {
        $user = Auth::user();
        $data = $user->pertanyaan_sya;
        // dd($data);

        return view('pertanyaan.pertanyaan_sya', compact('data'));
    }
}
