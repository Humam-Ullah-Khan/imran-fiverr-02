<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DesignerJob;

class Assessment extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'type',
        'additional_attributes',
        'height',
        'Amount',
        'width',
        'details',
        'stripe_id',
        'stripe_status',
        'discountCode',
        'cusDiscountCode',
        'Estatus',
    ];

    public function designerJob()
    {
        return $this->hasOne(DesignerJob::class, 'job_id', 'id')->latest();
    }
}
