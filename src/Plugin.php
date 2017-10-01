<?php

namespace Dot\Tags;

use Gate;
use Navigation;
use URL;

class Plugin extends \Dot\Platform\Plugin
{

    public $permissions = [
        "manage"
    ];

    function boot()
    {

        Navigation::menu("sidebar", function ($menu) {

            if (Gate::allows("tags.manage")) {
                $menu->item('tags', trans("tags::tags.tags"), URL::to(ADMIN . '/tags'))->icon("fa-tags")->order(3);
            }

        });

        include __DIR__ . "/routes.php";

    }
}
