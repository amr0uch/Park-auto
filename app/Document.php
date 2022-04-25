<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'label',
    ];
    public function clients(){
        return $this->belongsToMany(Client::class,'client_document','id_client','id_document');
    }
    // public function cars(){
    //     return $this->belongsToMany(Client::class,'client_document','id_client','id_document');
    // }
}
