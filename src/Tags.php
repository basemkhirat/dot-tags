<?php

namespace Dot\Tags;

use Gate;
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

            if (Gate::allows("tags.manage")) {
                $menu->item('tags', trans("tags::tags.tags"), URL::to(ADMIN . '/tags'))->icon("fa-tags")->order(3);
            }
        });
    }
}
