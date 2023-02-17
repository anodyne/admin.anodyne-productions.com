<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddonsLayout extends Component
{
    public function __construct(
        public string $title,
        public string $description = ''
    ) {
    }

    public function render()
    {
        return view('layouts.addons');
    }
}
