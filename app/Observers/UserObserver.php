<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  User $User
     * @return void
     */
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }
}
