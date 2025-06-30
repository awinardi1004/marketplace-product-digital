<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Tools extends Component
{
    public $tools;

    public function __construct($tools)
    {
        $this->tools = $tools;
    }

    public function render(): View|Closure|string
    {
        return view('components.tools', [
            'tools' => $this->tools
        ]);
    }
}
