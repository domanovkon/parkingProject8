<?php
namespace App\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService {

    public function saveSocialData($user) {
        $email = $user->getEmail();
        $name = $user->getName();

        $password = Hash::make('12345678');

        $data = ['email' => $email, 'password' => $password, 'name' => $name];
        $u = User::where('email', $email)->first();

        if ($u) {
            return $u->fill(['name' => $name]);
        }
        return User::create($data);

    }
}
