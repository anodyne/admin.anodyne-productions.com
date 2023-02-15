<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    public function __construct(
        public string $bgColor = 'bg-gray-50',
        public string $textColor = 'text-gray-500',
        public string $title = ''
    ) {
    }

    public function render()
    {
        return view('layouts.base');
    }
}
