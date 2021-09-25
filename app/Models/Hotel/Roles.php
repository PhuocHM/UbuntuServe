<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Hotel\RolesList;

class Roles extends Model
{
    use HasFactory;
    protected $table = "roles";
    public function role_permissions()
    {
        return  $this->belongsToMany(RolesList::class, 'roles_permission', 'role_id', 'role_list_id');
    }
}
