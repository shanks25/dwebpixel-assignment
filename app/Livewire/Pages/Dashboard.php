<?php

namespace App\Livewire\Pages;

use App\Models\JobPost;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $jobCount = JobPost::count();

        return view('livewire.pages.dashboard', [
            'jobCount' => $jobCount,
        ]);
    }
}