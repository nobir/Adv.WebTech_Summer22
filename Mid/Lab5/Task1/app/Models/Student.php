<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $primaryKey = "s_id";

    public $increment = true;

    public $timesamps = true;

    public function department()
    {
        return $this->belongsTo(Department::class, "d_id", "d_id");
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 's_id', 'c_id');
    }
}
