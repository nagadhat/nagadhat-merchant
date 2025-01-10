<?php

namespace App\View\Components;

use Illuminate\View\Component;

class topNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $userDetails;
    public function __construct($userDetails)
    {
        //Collect user information fron parrent view and make it accessable from view
        $this->userDetails = $userDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.top-nav');
    }
}
