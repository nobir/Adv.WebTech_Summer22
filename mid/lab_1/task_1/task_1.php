<?php

class Student
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function printDetails()
    {
        echo "Student ID: " . $this->getId() . "<br>";
        echo "Student Name: " . $this->getName()  . "<br><br>";
    }
}

class Department
{
    private $id;
    private $name;
    private $students = [];

    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }

    public function deleteStudent($id)
    {
        if(count($this->students) == 0)
        {
            return;
        }

        $i = 0;

        for ($i = 0; $i < count($this->students); ++$i)
        {
            if($this->students[$i]->getId() == $id)
            {
                $this->students[$i] = null;
                break;
            }
        }
    }

    public function printStudents()
    {
        foreach ($this->students as $student) {
            if($student == null) {
                continue;
            }

            $student->printDetails();
        }
    }
}


$department = new Department(101, "CSE");

$s1 = new Student(1, "Nobir");
$s2 = new Student(2, "Hossain");
$s3 = new Student(3, "Samuel");

$department->addStudent($s1);
$department->addStudent($s2);
$department->addStudent($s3);

// $department->deleteStudent(2);


$department->printStudents();