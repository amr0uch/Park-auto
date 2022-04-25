<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'label','slug'
    ];

    public function cars() {
        return $this->hasMany('App\Car', 'id_status');
    }
}
