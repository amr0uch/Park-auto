<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'first_name','last_name','address','email','telephone',
        'cin','permit',
    ];
        public function contract(){
            return $this->hasOne('App/Contract','id_client');
        }
    // public function documents(){
    //     return $this->belongsToMany('App\Document', 'client_document','id_document','id_client')->withPivot('file');
    // }
    public function documents(){
        return $this->belongsToMany(Document::class,'client_document','id_client','id_document')->withPivot('file','id');
    }

}
