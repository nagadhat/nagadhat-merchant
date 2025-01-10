<?php

namespace App\View\Components;

use Illuminate\View\Component;

class leftSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $userDetails;
    public function __construct($userDetails)
    {
        //
        $this->userDetails = $userDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fragment.common-fragment.left-sidebar');
    }
}
