<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTestimony extends Model
{
    protected $fillable=['name','work','statement','photo'];
    
    public static function getClientTestimony(){
        return ClientTestimony::latest()->get();
    }

    public function getPhotoUrlAttribute()
    {
        return asset('storage/testimonies/'.$this->photo);
    }

}
