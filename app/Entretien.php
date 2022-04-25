<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $table='entretien'; 
    protected $fillable = [
        'car_id','alert_id','date','km'
    ];

    public function alerts() {
        return $this->belongsTo('App\Alert', 'alert_id');
    }
    public function cars() {
        return $this->belongsTo('App\Car', 'car_id');
    }
}