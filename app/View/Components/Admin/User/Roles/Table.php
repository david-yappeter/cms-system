<?php

namespace App\View\Components\Admin\User\Roles;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $roles;

    public function __construct($user, $roles)
    {
        $this->user = $user;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.user.roles.table');
    }
}
