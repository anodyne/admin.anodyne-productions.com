<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public ?string $href = null,
        public string $variant = 'light',
        public string $color = 'secondary',
        public string $size = 'md'
    ) {
    }

    public function baseStyles()
    {
        return 'group relative inline-flex items-center justify-center rounded-full font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 transition';
    }

    public function colorStyles()
    {
        return [
            'light' => [
                'primary' => 'bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 hover:shadow-md focus-visible:outline-slate-900',
                'secondary' => 'bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-100 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-md hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
            ],
            'dark' => [
                'primary' => 'bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-50 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
                'secondary' => 'bg-slate-900 hover:bg-gradient-to-b hover:from-slate-900 hover:to-purple-900/30 ring-1 ring-slate-800 text-white hover:ring-purple-700/30 shadow-md hover:shadow-purple-700/40 hover:text-purple-100 focus-visible:outline-white',
                'brand' => 'bg-purple-600 text-white shadow-md hover:bg-purple-700',
            ],
        ][$this->variant][$this->color];
    }

    public function sizeStyles()
    {
        return [
            'sm' => 'py-1.5 px-4',
            'md' => 'py-2 px-5',
        ][$this->size];
    }

    public function render()
    {
        return view('components.button');
    }
}
