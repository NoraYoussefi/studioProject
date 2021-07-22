<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class albumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = album::all();
        return view('album.list', compact('albums','albums'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
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
            'txtAlbumName'=>'required',
            'txtBio'=> 'required',
            'txtAlbumDate' => 'required',
        ]);
 
        $student = new Artist([
            'albumName' => $request->get('txtAlbumName'),
            'bio'=> $request->get('txtBio'),
            'albumDate'=> $request->get('txtAlbumDate'),
         
        ]);
 
        $student->save();
        return redirect('/album')->with('success', 'Album has been added');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('album.view',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('album.edit',compact('album'));
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
            'txtAlbumName'=>'required',
            'txtBio'=> 'required',
            'txtAlbumDate' => 'required',
        ]);
 
        $album = Artist::find($id);
        $album->albumName = $request->get('txtAlbumName');
        $album->bio = $request->get('txtBio');
        $album->albumDate = $request->get('txtAlbumDate');

        $album->update();
 
        return redirect('/album')->with('success', 'album updated successfully');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $album->delete();
        return redirect('/album')->with('success', 'album deleted successfully');
    }
}
