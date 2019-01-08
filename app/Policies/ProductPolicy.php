<?php

namespace App\Policies;

use App\Product;
use App\User;
use App\UserRoles;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function view(User $user, Product $product){
        return true;
    }
    public function create(User $user){
        return $user->role == UserRoles::ADMIN || $user->role == UserRoles::ENTERPRISE;

    }
    public function update(User $user, Product $product){
        return ($user->role == UserRoles::ADMIN || $user->role == UserRoles::ENTERPRISE) && $user->id == $product->user_id;
    }
    public function delete(User $user, Product $product){
        return ($user->role == UserRoles::ADMIN || $user->role == UserRoles::ENTERPRISE) && $user->id == $product->user_id;
    }
}
