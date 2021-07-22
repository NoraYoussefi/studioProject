<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



    //-----------------------------ADMIN SIDE--------------------------------//
Route::group([
    'prefix' => 'admin'

], function () {
    //----------------------AJOUTER UN UTILISATEUR---------------------------//
    Route::post('add-artist', [AdminController::class, 'storeArtist']);
    Route::post('add-album', [AdminController::class, 'storeAlbum']);
    Route::post('add-song', [AdminController::class, 'storeSong']);
    Route::post('add-role', [AdminController::class, 'storeRole']);
    Route::post('add-session', [AdminController::class, 'storeSession']);


    //----------------------SUPPRIMMER UN UTILISATEUR------------------------//
    Route::delete('delete-artist/{id_artist}', [AdminController::class, 'destroyArtist']);
    Route::delete('delete-album/{id_album}', [AdminController::class, 'destroyAlbum']);
    Route::delete('delete-song/{id_song}', [AdminController::class, 'destroySong']);
    Route::delete('delete-role/{id_role}',[AdminController::class,'destroyRole']);
    Route::delete('delete-session/{id_session}',[AdminController::class,'destroySession']);


    //----------------------SUPPRIMMER UN UTILISATEUR------------------------//

    Route::post('update-artist/{id_artist}', [AdminController::class, 'updateArtist']);
    Route::post('update-album/{id_album}', [AdminController::class, 'updateAlbum']);
    Route::post('update-song/{id_song}', [AdminController::class, 'updateSong']);
    Route::post('update-role/{id_role}',[AdminController::class,'updateRole']);
    Route::post('update-session/{id_session}',[AdminController::class,'updateSession']);
  

});

//-----------------------------ARTIST SIDE--------------------------------//
Route::group([
    'prefix' => 'artists','as'=>'artist.'

], function () {
    // ----------------------AJOUTER UN UTILISATEUR---------------------------//
     Route::post('add-artist', [AdminController::class, 'storeArtist']);
     Route::post('add-album', [AdminController::class, 'storeAlbum']);
     Route::post('add-song', [AdminController::class, 'storeSong']);
     Route::post('add-role', [AdminController::class, 'storeRole']);
     Route::post('add-session', [AdminController::class, 'storeSession']);
 
 
     //----------------------SUPPRIMMER UN UTILISATEUR------------------------//
     Route::delete('delete-artist/{id_artist}', [AdminController::class, 'destroyArtist']);
     Route::delete('delete-album/{id_album}', [AdminController::class, 'destroyAlbum']);
     Route::delete('delete-song/{id_song}', [AdminController::class, 'destroySong']);
     Route::delete('delete-role/{id_role}',[AdminController::class,'destroyRole']);
     Route::delete('delete-session/{id_session}',[AdminController::class,'destroySession']);
 
 
     //----------------------SUPPRIMMER UN UTILISATEUR------------------------//
 
     Route::post('update-artist/{id_artist}', [AdminController::class, 'updateArtist']);
     Route::post('update-album/{id_album}', [AdminController::class, 'updateAlbum']);
     Route::post('update-song/{id_song}', [AdminController::class, 'updateSong']);
     Route::post('update-role/{id_role}',[AdminController::class,'updateRole']);
     Route::post('update-session/{id_session}',[AdminController::class,'updateSession']);
   
 
  
 });



 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
