<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use Illuminate\Http\Request;
use App\Models\FeeHead;
use App\Models\AcademicYear;
use App\Models\Classes;


class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $feeHeads = FeeHead::all();
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        $query = FeeStructure::with('class', 'academicYear', 'feeHead');
        if ($request->isMethod('post')) {
            //dd($request->all());
            if ($request->filled('academicYear_id'))
                $query->where('academic_year_id', $request->academicYear_id);
            if ($request->filled('class_id'))
                $query->where('class_id', $request->class_id);
            if ($request->filled('feeHead_id'))
                $query->where('fee_head_id', $request->feeHead_id);
        }
        $feeStructures = $query->get();
        return view('admin.feestructure.list', compact('feeStructures', 'feeHeads', 'academicYears', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feeHeads = FeeHead::all();
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        return view('admin.feestructure.create', compact('feeHeads', 'academicYears', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'academic_year_id' => 'required',
            'fee_head_id' => 'required',
        ]);
        $feeStructure = new FeeStructure();
        $feeStructure->class_id = $request->class_id;
        $feeStructure->academic_year_id = $request->academic_year_id;
        $feeStructure->fee_head_id = $request->fee_head_id;
        $feeStructure->april = $request->april;
        $feeStructure->may = $request->may;
        $feeStructure->june = $request->june;
        $feeStructure->july = $request->july;
        $feeStructure->august = $request->august;
        $feeStructure->september = $request->september;
        $feeStructure->october = $request->october;
        $feeStructure->november = $request->november;
        $feeStructure->december = $request->december;
        $feeStructure->january = $request->january;
        $feeStructure->february = $request->february;
        $feeStructure->march = $request->march;

        $feeStructure->save();
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeStructure $feeStructure)
    {
        $feeHeads = FeeHead::all();
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        return view('admin.feestructure.edit', compact('feeHeads', 'academicYears', 'classes', 'feeStructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeStructure $feeStructure)
    {
        $request->validate([
            'class_id' => 'required',
            'academic_year_id' => 'required',
            'fee_heads' => 'required',
        ]);
        // $feeStructure->fill($request->all());
        $feeStructure->update($request->all());
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeStructure $feeStructure)
    {
        $feeStructure->delete();
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Deleted Successfully');
    }
}
