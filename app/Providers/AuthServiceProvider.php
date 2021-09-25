<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel\RolesPermission;
use App\Models\Hotel\RolesList;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $all_roles = RolesList::all()->pluck('role_name', 'id')->toArray();
        foreach ($all_roles as $role) {
            Gate::define($role, function ($user, $role = '') {
                //dd($user->user_role->role_permissions->pluck('role_name', 'id')->toArray());
                $user_roles = $user->user_role->role_permissions->pluck('role_name', 'id')->toArray();
                if (in_array($role, $user_roles)) {
                    return true;
                }
                return false;
            });
        }
    }
}
