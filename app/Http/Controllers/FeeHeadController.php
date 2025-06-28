<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees=FeeHead::all();
        return view('admin.feehead.read',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feehead.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        FeeHead::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('fee-head.read')->with('success','Fee Head Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeHead $feeHead)
    {
        return view('admin.feehead.show',compact('feeHead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeHead $feeHead)
    {
        return view('admin.feehead.edit',compact('feeHead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeHead $feeHead)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $feeHead->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('fee-head.read')->with('success','Fee Head Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeHead $feeHead)
    {
        $feeHead->delete();
        return redirect()->route('fee-head.read')->with('success','Fee Head Deleted Successfully');
    }
}
