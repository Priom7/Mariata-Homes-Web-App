<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'role_id'];

    /**
     * Get the user that owns the user role.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the role that owns the user role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
