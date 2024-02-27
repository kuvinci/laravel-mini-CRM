<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Employee::class, 'employee');
    }

    /**
     * Display a listing of the employees.
     */
    public function index(Request $request)
    {
        $this->authorize('view', Employee::class);

        $search = $request->get('search');

        $employees = Employee::when($search, function ($query) use ($search) {
            return $query->where('first_name', 'like', '%'.$search.'%')
                ->orWhere('last_name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('phone', 'like', '%'.$search.'%')
                ->orWhereHas('company', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                });
        })->paginate(10);

        return view('employees.index', compact('employees', 'search'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $this->authorize('create', Employee::class);

        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created employee in the database.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        Employee::create($data);

        return redirect()
            ->route('employees.index')
            ->with('success','Employee created successfully.');
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', Employee::class);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update', Employee::class);

        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified employee in the database.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $employee->update($data);
        return redirect()
            ->route('employees.index')
            ->with('success','Employee updated successfully.');
    }

    /**
     * Remove the specified employee from the database.
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', Employee::class);

        $employee->delete();
        return redirect()
            ->route('employees.index')
            ->with('success','Employee deleted successfully.');
    }
}
