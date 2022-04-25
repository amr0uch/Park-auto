<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_client','id_user','id_car','debut_contract',
        'end_contract','amount',
    ];
      public function car() {
        return $this->belongsTo('App\Car', 'id_car');
    }
    public function clients() {
        return $this->belongsTo('App\Client', 'id_client');
    }
    public function users() {
        return $this->belongsTo('App\User', 'id_user');
    }


}
