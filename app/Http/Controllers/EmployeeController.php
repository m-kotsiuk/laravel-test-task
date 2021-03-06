<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('employees.index');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {

        $employee = Employee::create([
            'name' => $request['name'],
            'employment_date' => $request['employment_date'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'position_id' => $request['position_id'],
            'salary' => $request['salary'],
            'parent_id' => $request['parent_id']
        ]);

        $this->savePhoto($request->file('photo_file'), $employee);

        return redirect()
            ->route('employees.edit', $employee)
            ->with('status', [
                'title' => 'Success',
                'description' => 'New employee was successfully created.'
            ]);
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $params = [
            'name' => $request['name'],
            'employment_date' => $request['employment_date'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'position_id' => $request['position_id'],
            'salary' => $request['salary'],
            'parent_id' => $request['parent_id']
        ];

        $employee->update($params);

        if ($newPhoto = $request->file('photo_file')) {
            $this->deletePhoto($employee);
            $this->savePhoto($newPhoto, $employee);
        }

        return redirect()
            ->route('employees.index')
            ->with('status', [
                'title' => 'Success',
                'description' => 'Employee was successfully updated.'
            ]);
    }


    public function destroy(Employee $employee)
    {

        $employee->children()->each(function ($subordinate) use ($employee) {
            if ($parent = $employee->parent) {
                $parent->appendNode($subordinate);
            } else {
                $subordinate->makeRoot()->save();
            }
        });

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('status', [
                'title' => 'Success',
                'description' => 'Employee is successfully removed.'
            ]);
    }

    public function getAutoCompleteData(Request $request)
    {
        $employees = Employee::select('id', 'name');
        if ($request->has('term')) {
            $employees
                ->where('name', 'like', '%' . $request->input('term') . '%')
                ->where('id', '!=',  $request->input('id'));
        }

        return $employees->limit(20)->get();
    }


    public function getTables()
    {
        return DataTables::of(Employee::query())
            ->addColumn('action', function (Employee $employee) {
                return view('components.table-controls', [
                    'editRoute' => route('employees.edit', compact('employee')),
                    'deleteRoute' => route('employees.destroy', compact('employee')),
                    'name' => $employee->name
                ]);
            })
            ->editColumn('employment_date', function (Employee $employee) {
                return $employee->employment_date->format('d.m.y');
            })
            ->editColumn('position_id', function (Employee $employee) {
                return $employee->position()->value('name');
            })
            ->editColumn('salary', function (Employee $employee) {
                return '$' . number_format($employee->salary, 2, '.', ',') ;
            })
            ->editColumn('photo', function (Employee $employee) {
                return view('components.thumbnail', ['img' => $employee->photo]);
            })
            ->make(true);
    }

    private function savePhoto(UploadedFile $file, Employee $employee)
    {
        $path = 'public/profile-images/' . $employee->id . '/' . $file->getClientOriginalName();

        $img = Image::make($file)
            ->orientate()
            ->fit(300,300)
            ->encode('jpg', 80);

        Storage::put($path, $img);

        $employee->update([
            'photo' => Storage::url($path)
        ]);
    }

    private function deletePhoto(Employee $employee)
    {
        Storage::deleteDirectory('public/profile-images/' . $employee->id);
    }
}
