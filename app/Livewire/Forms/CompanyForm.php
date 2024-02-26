<?php

namespace App\Livewire\Forms;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $website;
    public $logo;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'website' => 'nullable|url',
        'logo' => 'nullable|image|dimensions:min_width=100,min_height=100'
    ];

    public function mount(Company $company): void
    {
        if(!$company){
            return;
        }

        $this->name = $company->name;
        $this->email = $company->email;
        $this->website = $company->website;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $logoPath = null;
        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public'); // Store in the "logos" folder on the public disk
        }

        Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'logo' => $logoPath,
        ]);

        session()->flash('message', 'Company created successfully.');
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.create-company');
    }
}
