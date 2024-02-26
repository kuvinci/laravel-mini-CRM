<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    /**
     * Display a listing of the companies.
     */
    public function index(Request $request)
    {
        $this->authorize('view');

        $search = $request->get('search');

        $companies = Company::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('website', 'like', '%'.$search.'%');
        })->paginate(10);

        return view('companies.index', compact('companies', 'search'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        $this->authorize('create');

        return view('companies.create');
    }

    /**
     * Store a newly created company in the database.
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Company::create($data);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        $this->authorize('view');

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        $this->authorize('update');

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in the database.
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $this->authorize('update');

        $data = $request->validated();

        $company->update($data);
        return redirect()
            ->route('companies.index')
            ->with('success','Company updated successfully.');
    }

    /**
     * Remove the specified company from the database.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()
            ->route('companies.index')
            ->with('success','Company deleted successfully.');
    }
}
