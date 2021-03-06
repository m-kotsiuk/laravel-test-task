<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        $employee = $this->route('employee');

        $employeeId = isset($employee) ? $employee->id : null;

        return [
            'name' => 'required|min:6|max:255',
            'employment_date' => 'required|date_format:d.m.y',
            'phone_number' => 'required|regex:/^\+380 \(\d{2}\) \d{3} \d{2} \d{2}$/|unique:employees,phone_number,' .  $employeeId . ',id',
            'email' => 'required|email|unique:employees,email,' . $employeeId . ',id',
            'position_id' => 'required|exists:positions,id',
            'salary' => 'required|numeric|min:0|max:500000',
            'photo_file' =>  ($employeeId ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png|max:5120|dimensions:min_width=300,min_height=300',
            'parent_id' => [
                'nullable',
                'exists:employees,id',
                function ($attribute, $value, $fail) use ($employeeId) {

                    if ($value === $employeeId) {
                        $fail(__('Employee cannot be his own supervisor.'));
                        return;
                    }

                    $makeFail = function () use ($fail) {
                        $fail(__('Unable to assign a supervisor. Only 5 levels of subordination allowed!'));
                    };

                     $depth = Employee::withDepth()->find($value)->depth;

                    if ($depth > 4) {
                        $makeFail();
                        return;
                    }

                    if (!$employeeId) return;

                    $allowedDepthUnits = 4 - $depth;
                    $employee =  Employee::withDepth()->find($employeeId);
                    $employeeDepth = $employee->depth;

                    if (
                        $employee
                            ->descendants()
                            ->select('id')
                            ->withDepth()
                            ->having('depth', '>', $employeeDepth + $allowedDepthUnits)
                            ->get()
                            ->count()
                    ) {
                        $makeFail();
                    }
                }
            ]
        ];
    }
}
