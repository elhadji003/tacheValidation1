<?php

namespace App\View\Components\Editors;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EasyMDE extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.editors.easy-m-d-e');
    }
}
