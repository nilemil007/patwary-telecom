<?php

namespace App\Http\Livewire\Rso;

use App\Rules\CheckExistingPassword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ChangePassword extends Component
{
    public string $current_password;

    /**
     * @throws ValidationException
     */
    public function updated( $changePassword )
    {
        $this->validateOnly( $changePassword,[
            'current_password' => [
                'required',
                'min:8',
                'max:150',
                new CheckExistingPassword(Auth::user()),
            ],
        ]);
    }

    protected array $messages = [
        'current_password.required' => 'Can\'t keep it empty.',
    ];

    protected array $validationAttributes = [
        'current_password'    => 'Current Password',
    ];


    public function render(): Factory|View|Application
    {
        return view('livewire.rso.change-password');
    }
}
