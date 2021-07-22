<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class songController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = song::all();
        return view('song.list', compact('songs','songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('song.create');
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
            'txtName'=>'required',
            'txtBio'=> 'required',
            'txtFullName' => 'required',
            'txtSongDate' => 'required',
            'txtPath' => 'required',
            'txtEx' => 'required',
            'txtSize' => 'required',
            'txtLyrics' => 'required',
        ]);
 
        $student = new Song([
            'name' => $request->get('txtName'),
            'bio'=> $request->get('txtBio'),
            'fullName'=> $request->get('txtFullName'),
            'songDate'=> $request->get('txtSongDate'),
            'path'=> $request->get('txtPath'),
            'ex'=> $request->get('txtEx'),
            'size'=> $request->get('txtSize'),
            'lyrics'=> $request->get('txtLyrics'),
            'path'=> $request->get('txtPath'),

        ]);
 
        $student->save();
        return redirect('/song')->with('success', 'Song has been added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('song.view',compact('song'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('song.edit',compact('song'));

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
            'txtName'=>'required',
            'txtBio'=> 'required',
            'txtFullName' => 'required',
            'txtSongDate' => 'required',
            'txtPath' => 'required',
            'txtEx' => 'required',
            'txtSize' => 'required',
            'txtLyrics' => 'required',
        ]);
 
        $song = Song::find($id);
        $song->fullName = $request->get('txtName');
        $song->artistName = $request->get('txtBio');
        $song->userName = $request->get('txtFullName');
        $song->email = $request->get('txtEmail');
        $song->bio = $request->get('txtBio');
        
        $song->update();
 
        return redirect('/song')->with('success', 'song updated successfully');
   
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
