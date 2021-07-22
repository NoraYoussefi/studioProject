<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class artistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artists = artist::all();
        return view('artist.list', compact('artists','artists'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('artist.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'txtFullName'=>'required',
            'txtArtistName'=> 'required',
            'txtUserName' => 'required',
            'txtEmail' => 'required',
            'txtBio' => 'required',
        ]);
 
        $student = new Artist([
            'fullName' => $request->get('txtFullName'),
            'artistName'=> $request->get('txtArtistName'),
            'userName'=> $request->get('txtUserName'),
            'email'=> $request->get('txtEmail'),
            'bio'=> $request->get('txtBio'),
        ]);
 
        $student->save();
        return redirect('/artist')->with('success', 'Artist has been added');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
        return view('artist.view',compact('artist'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
        return view('artist.edit',compact('artist'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
 
        $request->validate([
            'txtFullName'=>'required',
            'txtArtistName'=> 'required',
            'txtUserName' => 'required',
            'txtEmail' => 'required',
            'txtBio' => 'required',
        ]);
 
        $artist = Artist::find($id);
        $artist->fullName = $request->get('txtFullName');
        $artist->artistName = $request->get('txtArtistName');
        $artist->userName = $request->get('txtUserName');
        $artist->email = $request->get('txtEmail');
        $artist->bio = $request->get('txtBio');
        
        $artist->update();
 
        return redirect('/artist')->with('success', 'artist updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
        $artist->delete();
        return redirect('/artist')->with('success', 'artist deleted successfully');
    }
}
