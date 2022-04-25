<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
    protected $table = 'client_document';
    protected $fillable = [
        'id_client','id_document','file'
    ];

   public function document(){
       return $this->belongsTo(Document::class,'id_document');
   }

   public function client(){
    return $this->belongsTo(Client::class,'id_client');
}

}
