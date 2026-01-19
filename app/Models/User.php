<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    // Laravel expects 'password', but we have 'password_hash'
    protected $hidden = ['password_hash'];

    // Map the password column to Laravel's auth
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password_hash',
        'role',
        'student_id',
    ];
}
