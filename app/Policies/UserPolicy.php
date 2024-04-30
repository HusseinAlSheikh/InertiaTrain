<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


   
    public function create(User $user)
    {
       return $user->email === 'rosemarie.zemlak@example.org' ;
    }

    
    public function edit(User $user, User $otherUser )
    {
       return (bool)mt_rand(0,1);
    }

    public function delete(User $user, User $otherUser )
    {
       return !!mt_rand(0,1);
    }

}
