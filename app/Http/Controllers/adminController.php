<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
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
        
        if(auth()->user()['role']=='admin'){

            $new_user=app('App\Http\Controllers\AuthController')->register($request);

            $id=(collect($new_user)->toArray())['original']['user']['id'];  //ID de l'utilisateur creer

                    //Si l'utilisateur 
                    if($request['user_type']=='student'){
                        Etudiant::create([
                            'name'=>$request['name'],
                            'email'=>$request['email'],
                            'user_id'=>$id,
                            'cne'=>$id,         ]);
                    }
                    //Si l'utilisateur est un Professeur
                    else if($request['user_type']=='professor'){
                        Professeur::create([
                            'name'=>$request['name'],
                            'email'=>$request['email'],
                            'user_id'=>$id,
                            'js_id_emploi'=>'calendar_id_'.$id,         ]);
                    }
                    else{
                        return "Invalid User Type :(, Must be 'student' or 'professor' !!!";
                    }
                return $new_user;
            }
            else{
                return "vous n'etes pas un admin";   //authentifie mais pas admin
            }

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



    //____________________________________Getters_________________________________________


    public function getArtist()
    {
       if(Auth::guard()->user()['user_type']=='admin'){

            return Artist::all();

        }
        else{
            return "not admin";
        }
    }

    public function getAlbum()
    {
       if(Auth::guard()->user()['user_type']=='admin'){
            return Album::all();
        }else{
            return "not admin";
        }
    }

    public function getSong()
    {
       if(Auth::guard()->user()['user_type']=='admin'){
             return Song::all();
        }else{
             return "not admin";
        }
    }

    public function getRole()
    {
        if(Auth::guard()->user()['user_type']=='admin'){
            return Role::all();
         }else{
            return "not admin";
         }               
    }

    public function getPermission()
    {
       if(Auth::guard()->user()['user_type']=='admin'){
            return ermission::all();
        }else{
            return "not admin";
        }
    }

}
