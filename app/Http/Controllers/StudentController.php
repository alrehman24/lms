<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        $query = User::with('class', 'academicYear');
        if ($request->isMethod('post')) {
            //dd($request->all());
            if ($request->filled('academicYear_id'))
                $query->where('academic_year_id', $request->academicYear_id);
            if ($request->filled('class_id'))
                $query->where('class_id', $request->class_id);
        }
        $query->where('role', 'student');
        $students = $query->get();
        return view('admin.student.list', compact('students', 'academicYears', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        return view('admin.student.create', compact('academicYears', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'academic_year_id' => 'required',
            'name' => 'required',

        ]);
        $student = new User();
        $student->fill($request->all());
        $student->role = 'student';
        $student->password = Hash::make('123456');
        $student->save();
        return redirect()->route('student.read')->with('success', 'Student Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student=null)
    {
        if(Auth::user()->role=='student')
        {
            $student=Auth::user();
        }
        $academicYears='';
        $classes='';
        if (Auth::user()->role == 'admin') {
            $academicYears = AcademicYear::all();
            $classes = Classes::all();
        }
        // dd($student->toArray());
        return view('admin.student.edit', compact('academicYears', 'classes', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $student)
    {
      //  dd($request->toArray());
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'class_id' => 'required',
                'academic_year_id' => 'required',
                'name' => 'required',
            ]);
        } else {
            $student = Auth::user();
            $request->validate([
                'name' => 'required',
            ]);
        }
        // $feeStructure->fill($request->all());
        $student->update($request->all());
        $route = 'student.read';
        if (Auth::user()->role == 'student') {
            $route = 'student.dashboard';
        }
        return redirect()->route($route)->with('success', 'Data  Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('student.read')->with('success', 'Student Deleted Successfully');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
