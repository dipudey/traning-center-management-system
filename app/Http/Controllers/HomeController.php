<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cource;
use App\Model\Batch;
use App\Model\Student;
use App\Model\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
          'total_cource' => Cource::count(),
          'total_batch' => Batch::count(),
          'total_student' => Student::count(),
          'total_due' => Payment::sum('due'),
        ]);
    }
}
