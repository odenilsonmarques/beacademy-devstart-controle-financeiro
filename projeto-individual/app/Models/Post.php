<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //metodo para relacionar muitos para um(N:1). Este post vai estar relecionado a um determinado usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
