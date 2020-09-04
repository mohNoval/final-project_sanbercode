<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pertanyaan;
use App\vote_pertanyaan;
use App\Point;

class VotePertanyaanController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        // $user = Pertanyaan::pertanyaan_vote();

        vote_pertanyaan::create([
            'point' => $request->point,
            'user_id' => Auth::user()->id,
            'pertanyaan_id' => $request->id_pertanyaan
        ]);

        Point::create([
            'point' => $request->point,
            'keterangan' => 'upvote',
            'user_id' => $request->author
        ]);

        return redirect('/pertanyaan/' . $request->id_pertanyaan)->with('vote', 'Berhasil Melakukan Upvote');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
