<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturers_code',
        'lecturers_name',
        'nip',
        'email',
        'telephone_number'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'lecturer_id');
    }
}
