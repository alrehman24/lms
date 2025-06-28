<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.academic_year.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'name' => 'required|unique:academic_years,name',
        ]);

        $academicYear = AcademicYear::create([
            'name' => $request->name,
        ]);

        if($academicYear){
            return redirect()->route('academic-year.create')->with('success', 'Academic Year created successfully');
        }
        else{
            return redirect()->route('academic-year.create')->with('error', 'Academic Year not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function read()
    {
        $data['academicYear'] = AcademicYear::all();
        return view('admin.academic_year.read', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        $data['academicYear'] = $academicYear;

        return view('admin.academic_year.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $request->validate([
            'name' => 'required|unique:academic_years,name,'.$academicYear->id,
        ]);

        $academicYear->name = $request->name;
        $academicYear->save();
        return redirect()->route('academic-year.read')->with('success', 'Academic Year updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(AcademicYear $academicYear)
    {
        $academicYear->delete();
        return redirect()->route('academic-year.read')->with('success', 'Academic Year deleted successfully');
    }
}
