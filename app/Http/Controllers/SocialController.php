<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback() {
        $user = Socialite::driver('vkontakte')->user();

        $objSocial = new SocialService();

        if ($user = $objSocial->saveSocialData($user)) {
            \Auth::login($user);
            return redirect()->route('home');
        }

        return back();


//        return redirect()->route('home');
    }
}
