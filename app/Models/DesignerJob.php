<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'designer_id',
        'job_name',
        'designer_email',
        'status',
        'amount',
        'assign_date',
        'complete_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'assign_date' => 'date',
        'complete_date' => 'date',
    ];

    protected $table="designerjob";

    public function getAssignDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function getCompleteDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function job()
    {
        return $this->belongsTo(Assessment::class, 'job_id', 'id');
    }

}
