<?php

namespace Dot\Tags;

use Illuminate\Support\Facades\Auth;
use Navigation;
use URL;

class Tags extends \Dot\Platform\Plugin
{

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {

            if (Auth::user()->can("tags.manage")) {
                $menu->item('tags', trans("tags::tags.tags"), URL::to(ADMIN . '/tags'))->icon("fa-tags")->order(3);
            }
        });
    }
}
