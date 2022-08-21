<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    use HasFactory;

    protected $table = "course_teacher";

    protected $primaryKey = "ct_id";

    public $increment = true;

    public $timesamps = true;
}
