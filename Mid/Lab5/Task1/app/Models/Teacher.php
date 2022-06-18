<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Course;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $primaryKey = "t_id";

    public $increment = true;

    public $timesamps = true;

    public function department()
    {
        return $this->belongsTo(Department::class, 'd_id', 'd_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher', 't_id', 'c_id');
    }
}
