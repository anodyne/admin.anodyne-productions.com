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
        return 'group relative inline-flex items-center justify-center rounded-full focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 transition';
    }

    public function colorStyles()
    {
        return [
            'light' => [
                'primary' => 'font-semibold bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 hover:shadow-md focus-visible:outline-slate-900',
                'secondary' => 'font-semibold bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-100 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-md hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
            ],
            'dark' => [
                'primary' => 'font-semibold bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-50 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
                'secondary' => 'font-semibold bg-slate-900 hover:bg-gradient-to-b hover:from-slate-900 hover:to-purple-900/30 ring-1 ring-slate-800 text-white hover:ring-purple-700/30 shadow-md hover:shadow-purple-700/40 hover:text-purple-100 focus-visible:outline-white',
                'brand' => 'font-semibold bg-purple-600 text-white shadow-md hover:bg-purple-700',
            ],
            'dynamic' => [
                'primary' => 'font-medium bg-slate-900 text-white hover:bg-slate-700 dark:bg-sky-400/10 dark:text-sky-400 dark:ring-1 dark:ring-inset dark:ring-sky-400/20 dark:hover:bg-sky-400/10 dark:hover:text-sky-300 dark:hover:ring-sky-300',
                'secondary' => 'font-medium bg-slate-100 text-slate-900 hover:bg-slate-200 dark:bg-slate-800/40 dark:text-slate-400 dark:ring-1 dark:ring-inset dark:ring-slate-800 dark:hover:bg-slate-800 dark:hover:text-slate-300',
            ],
        ][$this->variant][$this->color];
    }

    public function sizeStyles()
    {
        return [
            'xs' => 'py-1 px-3 text-sm',
            'sm' => 'py-1.5 px-4',
            'md' => 'py-2 px-5',
        ][$this->size];
    }

    public function render()
    {
        return view('components.button');
    }
}
