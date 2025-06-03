<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveOrder extends Model
{
    protected $table = 'archive_orders';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'type',
        'additional_attributes',
        'height',
        'width',
        'details',
        'stripe_id',
        'stripe_status',
    ];
}
