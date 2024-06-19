<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function manageCategories(User $user)
    {
        return $user->is_admin;
    }
}
