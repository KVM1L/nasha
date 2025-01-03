<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:8192',
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('employees', 'public');
            $data['image'] = $path;
        }

        Employee::create($data);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:8192',
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('image')) {
            if ($employee->image && Storage::exists($employee->image)) {
                Storage::delete($employee->image);
            }

            $path = $request->file('image')->store('employees', 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $employee->image;
        }

        $employee->update($data);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        Storage::disk('public')->delete($employee->image);

        $employee->delete();

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
