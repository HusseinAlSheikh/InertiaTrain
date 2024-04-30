<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('postLogin');
Route::post('/logout',[LoginController::class,'destroy'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return Inertia::render('Home');
    });


    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'),function($query,$search){
                    $query->where('name','like' ,'%'.$search.'%');
                })
                ->paginate()
                ->withQueryString()
                ->through(fn($user)=>[
                    'id' => $user->id,
                    'name'=> $user->name,
                    'can' => [
                        'edit'   => Auth::user()->can('edit' , $user),
                        'delete' => Auth::user()->can('delete' , $user),
                    ]
                ]),
            'filters' => request()->only(['search']) , 
            'can' => [
                'createUser' => Auth::user()->can('create',User::class)
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create','App\Models\User');

    Route::get('/users/{id}/edit', function ($id) {
        $user = User::findOrFail($id);
        return Inertia::render('Users/Edit',[
            'user' => $user
        ]);
    });


    Route::post('/users', function () {

        //------------validate
        $attributes = Request::validate([
            'name' => 'required|min:4' ,
            'email' => 'required|email' ,
            'password' => 'required|min:6' ,
        ]);
        //------------create
        User::create($attributes);
        //------------redirect
        return redirect('/users');
    });

    Route::patch('/users/{id}/update', function ($id) {
        $user = User::findOrFail($id);
        //------------validate
        Request::validate([
            'name' => 'required|min:4' ,
            'email' => 'required|email' ,
            'password' => 'required|min:6' ,
        ]);
        //------------create
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        //------------redirect
        return redirect('/users');
    });


    Route::delete('/users/{id}', function ($id) {
        $user = User::findOrFail($id);
        $user->delete();
        //------------redirect
        return redirect('/users');
    });


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    // Route::post('/logout', function () {
    //     dd('log out' , request());
    // });

});
