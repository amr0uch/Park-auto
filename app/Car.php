<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alert;
class Car extends Model
{
    protected $fillable = [
        'id_status', 'registration','model','fuel', 'color', 'doors_num',
        'passengers_num','file', 'price_day',
    ];
    public function statuses() {
        return $this->belongsTo('App\Status','id_status');
    }

   public function contract(){
       return $this->hasOne('App/Contract','id_car');
   }

   public function entretien(){
    return $this->hasOne('App/Entretien','car_id');
    }

    public function alerts(){
        return $this->belongsToMany(Alert::class,'cars_alerts','id_car','id_alert')->withPivot('date','id');
    }
    



}
