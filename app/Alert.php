<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'label',
    ];
    public function entretien(){
        return $this->hasOne('App/Entretien','alert_id');
    }

    public function cars(){
        return $this->belongsToMany(Car::class,'cars_alerts','id_car','id_alert');
    }
  
}
