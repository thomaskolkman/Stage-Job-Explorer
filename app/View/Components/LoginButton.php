<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoginButton extends Component
{
    public $label;
    public $variant;

    public function __construct($label = 'Login', $variant = 'primary')
    {
        $this->label = $label;
        $this->variant = $variant;
    }

    public function render()
    {
        return view('components.login-button');
    }
}
