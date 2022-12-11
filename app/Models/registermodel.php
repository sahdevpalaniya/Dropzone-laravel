<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registermodel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primarykey = "id";
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'date',
    //     'hobbie',
    //     'gender',
    //     'image',
    //     'password',
    //     'updated_at',
    //     'created_at',
    // ];

    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = ucwords($value);
    }
}
