<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    protected $primaryKey = "c_id";

    public $increment = true;

    public $timesamps = true;

    public function department()
    {
        return $this->belongsTo(Department::class, "d_id", "d_id");
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'c_id', 's_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher', 'c_id', 't_id');
    }
}
