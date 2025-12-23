<?php

namespace App\Filament\Resources\Roles;

use BezhanSalleh\FilamentShield\Resources\Roles\RoleResource as RolesRoleResource;

class RoleResource extends RolesRoleResource
{
    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 8;
    }

    public static function getNavigationLabel(): string
    {
        return '角色管理';
    }

    public static function getPluralModelLabel(): string
    {
        return '角色管理';
    }

    public static function getModelLabel(): string
    {
        return '角色';
    }
}
