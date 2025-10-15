<?php

namespace App\Livewire\Pages\Skills;

use App\Models\Skill;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Index extends Component
{
    public string $name = '';

    public $skills;
    public bool $editMode = false;
    public ?int $id = null;

    /**
     * Lifecycle hook: runs when the component is mounted.
     */
    public function mount(): void
    {
        $this->fetchSkills();
    }

    /**
     * Fetch all skills from the database.
     */
    public function fetchSkills(): void
    {
        $this->skills = Skill::all();
    }

    /**
     * Store a new skill with unique validation.
     */
    public function store(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'min:2', 'unique:skills,name'],
        ]);

        Skill::create(
            $this->pull(),
        );
        $this->resetForm();
        $this->fetchSkills();

        session()->flash('success', 'Skill added successfully!');
    }

    /**
     * Edit an existing skill.
     */
    public function edit(int $id): void
    {
        $skill = Skill::findOrFail($id);

        $this->id = $skill->id;
        $this->name = $skill->name;
        $this->editMode = true;
    }

    /**
     * Update an existing skill with unique validation.
     */
    public function update(): void
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                ValidationRule::unique('skills', 'name')->ignore($this->id),
            ],
        ]);

        $skill = Skill::findOrFail($this->id);

        $skill->update([
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->fetchSkills();

        session()->flash('success', 'Skill updated successfully!');
    }

    /**
     * Delete a skill.
     */
    public function delete(int $id): void
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        $this->fetchSkills();

        session()->flash('success', 'Skill deleted successfully!');
    }

    /**
     * Reset form properties.
     */
    public function resetForm(): void
    {
        $this->name = '';
        $this->id = null;
        $this->editMode = false;
    }

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
