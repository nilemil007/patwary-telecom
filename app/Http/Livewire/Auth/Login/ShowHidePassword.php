<?php

namespace App\Http\Livewire\Auth\Login;

use Livewire\Component;

class ShowHidePassword extends Component
{
    public string $type = 'password';

    public function type()
    {
        if ( $this->type == 'password' )
        {
            $this->type = 'text';
        }else{
            $this->type = 'password';
        }
    }
    public function render()
    {
        return view('livewire.auth.login.show-hide-password');
    }
}
