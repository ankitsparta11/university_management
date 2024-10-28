<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',      // The name of the student
        'class',             // The class of the student
        'class_teacher_id',  // The ID of the class teacher (foreign key)
        'admission_date',    // The admission date
        'yearly_fees',       // The yearly fees
        // Add any other attributes as necessary
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
