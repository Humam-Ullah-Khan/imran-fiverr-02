<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $cast = [
        'expiry_at' => 'datetime',
    ];

    protected $table ="discountcode";


    // boot method to add global scope

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($discountCode){
            if($discountCode->id == 1){
                return false;
            }
        });

    }

    
    // expiry_at attribute mutator
    public function setExpiryAtAttribute($value)
    {
        $this->attributes['expiry_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

}
