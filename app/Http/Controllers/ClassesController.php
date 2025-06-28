<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes=Classes::all();
        return view('admin.classes.read')->with('classes',$classes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $class=new Classes();
        $class->name=$request->name;
        $class->save();

        return redirect()->route('class.create')->with('success','Class created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        return view('admin.classes.edit')->with('class',$class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $class->name=$request->name;
        $class->save();
        return redirect()->route('class.read')->with('success','Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('class.read')->with('success','Class deleted successfully');
    }
}
