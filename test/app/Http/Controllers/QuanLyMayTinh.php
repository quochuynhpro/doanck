<?php

namespace App\Http\Controllers;
use App\Models\Computer;
use Illuminate\Http\Request;

class QuanLyMayTinh extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $list = computer::all();
    return view('dashboard', compact('list'));
    }

    /**
     * Store a newly created resource in storage.ư
     */
    public function store(Request $request)
    {
        $data =$request->all();
        $computer = new Computer();
        $computer->LabID = $data['LabID'];
        $computer->Name = $data['Name'];
        $computer->OperatingSystem = $data['Name'];
        $computer->Specifications = $data['Name'];
        $computer->Status = $data['Name'];
        $computer-> save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $computer = Computer::find($id);
        $list = Computer::all();
        return view('dashboard',compact('list','computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();
        $computer = Computer::find($id);
        $computer->LabID = $data['LabID'];
        $computer->Name = $data['Name'];
        $computer->OperatingSystem = $data['Name'];
        $computer->Specifications = $data['Name'];
        $computer->Status = $data['Name'];
        $computer-> save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Computer::find($id)->delete();
        return redirect()->back();
    }
}
