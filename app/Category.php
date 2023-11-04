<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    // untuk menghapus data (tetap dalam db) tapi akan masuk pada table deletedAt

    protected $fillable = [
        'name', 'photo', 'slug'
    ];

    protected $hidden = [];
}