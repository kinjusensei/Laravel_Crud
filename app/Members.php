<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use SoftDeletes;

    protected $table = 'persons';
    protected $dates = ['deleted_at'] ;

    protected $fillable = [
        'role', 'username', 'password',
        'first_name', "last_name", 'middle_name',
        'extension_name'
    ];
    protected $hidden = 'password';
}
