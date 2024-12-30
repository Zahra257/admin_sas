<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $departments = Department::where('organisationId', $user->organisationId)
         ->orderBy('created_at', 'DESC')
         ->get();
        
         return view('departments.index', compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $user = auth()->user();
        $organisationId = $user->organisationId; 

        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $data['organisationId'] = $organisationId;
        
        Department::create($data);

        return redirect()->route('departments')->with('success', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $department = Department::findOrFail($id);

       
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        $data = $request->validated();
        $department = Department::findOrFail($id);

        $department->update($data);

        return redirect()->route('departments')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments')->with('success', 'Department deleted successfully');
    }
}
