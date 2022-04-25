<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarAlert extends Model
{
    protected $table='cars_alerts';

    protected $fillable = [
        'id_car', 'id_alert', 'date'
    ];

    public function alert(){
        return $this->belongsTo(Alert::class,'id_alert');
    }
    public function car(){
        return $this->belongsTo(Car::class,'id_car');
    }
}
