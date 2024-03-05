<?php

namespace App\Policies\Chat;

use App\Models\User;

class UserPolicy
{
    public function talkTo(User $user,User $to){
        return $user->id != $to->id;
    }
}
