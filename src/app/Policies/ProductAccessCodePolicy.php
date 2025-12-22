<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProductAccessCode;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductAccessCodePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProductAccessCode');
    }

    public function view(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('View:ProductAccessCode');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProductAccessCode');
    }

    public function update(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('Update:ProductAccessCode');
    }

    public function delete(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('Delete:ProductAccessCode');
    }

    public function restore(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('Restore:ProductAccessCode');
    }

    public function forceDelete(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('ForceDelete:ProductAccessCode');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProductAccessCode');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProductAccessCode');
    }

    public function replicate(AuthUser $authUser, ProductAccessCode $productAccessCode): bool
    {
        return $authUser->can('Replicate:ProductAccessCode');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProductAccessCode');
    }

}