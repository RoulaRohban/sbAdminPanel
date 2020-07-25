<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function services()
    {
        return $this->hasMany('App\models\Service','library_id');
    }
}
