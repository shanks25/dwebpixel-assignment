<?php

namespace App\Livewire\Pages\Jobs;

use App\Livewire\Forms\JobForm;
use App\Models\Skill;
use App\Models\JobPost;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Create extends Component
{
    use WithFileUploads;

    // public JobForm $form;
    #[Rule('required|string|min:3')]
    public string $title = '';
    #[Rule('required|string|min:10')]
    public string $description = '';
    #[Rule('required|string')]
    public string $experience = '';
    #[Rule('required|min:0')]
    public string|int $salary = '';
    #[Rule('required|string')]
    public string $location = '';
    #[Rule('required|string|min:2')]
    public string $company_name = '';
    #[Rule('nullable|string')]
    public ?string $extra_info = null;
    #[Rule('required|array|min:1')]
    public array $skills = [];
    #[Rule('required|image|max:2048|mimes:jpeg,png,jpg')]
    public $company_logo;

    public function store(): void
    {
        $this->validate();

        $logoPath = upload($this->company_logo, 'company_logo');

        $data = collect($this->all())
            ->except(['company_logo', 'skills'])
            ->merge(['company_logo' => $logoPath])
            ->toArray();

        $jobPost = JobPost::create($data);

        $jobPost->skills()->sync($this->skills);

        session()->flash('success', 'Job created successfully!');

        $this->redirect('/admin/jobs', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.jobs.create', [
            'getSkills' => Skill::all(['id', 'name']),
        ]);
    }
}
