<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;

class Department extends Model
{
    use HasFactory;

    protected $table = "departments";

    protected $primaryKey = "d_id";

    public $increment = true;

    public $timesamps = true;

    public function students()
    {
        return $this->hasMany(Student::class, "d_id", "d_id");
    }

    public function courses()
    {
        return $this->hasMany(Course::class, "d_id", "d_id");
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, "d_id", "d_id");
    }
}
