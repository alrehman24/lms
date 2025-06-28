<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use App\Models\AcademicYear;
use App\Models\FeeHead;

class FeeStructure extends Model
{
    protected $fillable=[
        'class_id',
        'academic_year_id',
        'fee_head_id',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'january',
        'february',
        'march',
    ];
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class);
    }
}
