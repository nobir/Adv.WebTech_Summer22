<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    protected $table = "course_student";

    protected $primaryKey = "cs_id";

    public $increment = true;

    public $timesamps = true;
}
