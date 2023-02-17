<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public ?string $href = null,
        public string $variant = 'hero',
        public string $size = 'md'
    ) {
    }

    public function baseStyles()
    {
        return 'group relative inline-flex items-center justify-center rounded-full leading-none';
    }

    public function variantStyles()
    {
        return [
            'hero' => 'bg-white font-semibold text-slate-700 hover:text-purple-900 shadow-button hover:shadow-button-purple after:block after:absolute after:-inset-[1px] after:rounded-full after:bg-gradient-to-t after:from-black/5 after:opacity-50 hover:after:opacity-100 hover:after:from-purple-100/50 after:transition-opacity border border-transparent border-none',
            'primary' => 'font-semibold bg-slate-900 dark:bg-slate-100 hover:bg-slate-800 dark:hover:bg-white text-white dark:text-slate-500 dark:hover:text-slate-900 transition',
            'secondary' => 'font-semibold bg-slate-200/60 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition',
            'brand' => 'font-semibold bg-purple-600 hover:bg-purple-700 text-white transition',
            'text' => 'font-semibold text-slate-700 hover:text-slate-900 transition',
        ][$this->variant];
    }

    public function sizeStyles()
    {
        return [
            'xs' => 'py-2 px-3 text-xs',
            'sm' => 'py-2.5 px-3.5 text-sm',
            'md' => 'py-3 px-5 text-base',
        ][$this->size];
    }

    public function render()
    {
        return view('components.button');
    }
}
