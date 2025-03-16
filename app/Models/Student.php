<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'student_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($student) {
            $student->student_id = 'STU' . str_pad(Student::count() + 1, 5, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

