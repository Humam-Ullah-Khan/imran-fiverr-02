<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'email',
        'job_id',
        'stripe_reference',
        'stripe_status',
        'amount',
        'cusDiscountCode',
        'created_at',
        'update_at',
    ];

    // custom timestamps field name
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'update_at';

    protected $table = 'payments';
}
