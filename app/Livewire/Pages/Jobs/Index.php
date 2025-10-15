<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPost;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $jobs;

    /**
     * Lifecycle hook: runs when the component is mounted.
     */
    public function mount(): void
    {
        $this->loadJobs();
    }

    /**
     * Fetch all job posts with their related skills.
     */
    public function loadJobs(): void
    {
        $this->jobs = JobPost::with('skills')
            ->latest()
            ->get();
    }

    /**
     * Delete a job post and its related skills.
     */
    public function deleteJob(int $id): void
    {
        $job = JobPost::findOrFail($id);
        if (Storage::disk('public')->exists($job->company_logo)) {
            Storage::disk('public')->delete($job->company_logo);
        }
        $job->skills()->sync([]);
        $job->delete();
        $this->loadJobs();


        session()->flash('success', 'Job deleted successfully!');
    }

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
