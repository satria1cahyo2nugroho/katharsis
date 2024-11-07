<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Adminlayout extends Component
{
    public function render(): View
    {
        return view('admin.layout.appp');
    }
}
