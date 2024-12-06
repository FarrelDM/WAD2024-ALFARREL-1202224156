<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'nim',
        'student_name',
        'email',
        'major',
        'lecturer_id'
    ];

    public function lecturers()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}
