<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;

class JobForm extends Form
{
    use WithFileUploads;

    public $title;
    public $description;
    public $experience;
    public $salary;
    public $location;
    public $extra_info;
    public $company_name;
    public $company_logo;
    public $skills = [];

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience' => 'required|string|max:100',
            'salary' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'extra_info' => 'nullable|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image:|max:2048|mimes:jpeg,png,jpg',
            'skills' => 'required|array|min:1',
            'skills.*' => 'exists:skills,id',
        ];
    }
}
