<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function manageUsers(User $user)
    {
        return $user->is_admin;
    }
}
