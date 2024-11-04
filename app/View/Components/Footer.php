<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    public $logoPath;

    public function __construct($logoPath)
    {
        $this->logoPath = $logoPath;
    }

    public function render()
    {
        return view('components.footer');
    }
}
