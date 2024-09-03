<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect()->intended('home');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'role' => 'user',
                        'password' => Hash::make('21082002')
                    ]);

                Auth::login($newUser);

                return redirect()->intended('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function clear() {
        Artisan::call('optimize:clear');
        return redirect()->back();
    }

    public function migrate(){
        Artisan::call('migrate');
        return redirect()->back();
    }

    public function db_seed() {
        Artisan::call('db:seed');
        return redirect()->back();
    }

    public function optimize() {
        Artisan::call('optimize');
        return redirect()->back();
    }



}
