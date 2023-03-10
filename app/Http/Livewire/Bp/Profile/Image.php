<?php

namespace App\Http\Livewire\Bp\Profile;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    public $bp,$image;

    public function updatedImage()
    {
        $this->validate([
            'image' => [
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.bp.profile.image');
    }
}
