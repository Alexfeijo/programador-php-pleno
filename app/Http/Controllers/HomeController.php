<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use App\Repositories\StudentRepository;
use App\Repositories\RegistrationRepository;

class HomeController extends Controller
{
	public function __construct(CourseRepository $course, StudentRepository $student, RegistrationRepository $registration)
	{
		$this->course = $course;
		$this->student = $student;
		$this->registration = $registration;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function courses(Request $request)
    {
    	return view('courses', [
    		'courses' => $this->course->manager($request),
    	]);
    }

    public function students(Request $request)
    {
    	return view('students', [
    		'students' => $this->student->manager($request)
    	]);
    }

    public function registrations(Request $request)
    {
    	return view('registrations',[
    		'courses' 		=> $this->course->getAll(),
    		'registrations' => $this->registration->manager($request),
    		'students'	=> $this->student->getAll()
    	]);
    }
}
