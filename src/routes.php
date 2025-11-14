<?php

/*
 * WEB
 */
Route::group([
    "prefix" => ADMIN,
    "middleware" => ["web", "auth:backend", "can:tags.manage"],
    "namespace" => "Dot\\Tags\\Controllers"
], function ($route) {
    $route->group(["prefix" => "tags"], function ($route) {
        $route->any('/', ["as" => "admin.tags.show", "uses" => "TagsController@index"]);
        $route->any('/create', ["as" => "admin.tags.create", "uses" => "TagsController@create"]);
        $route->any('/{id}/edit', ["as" => "admin.tags.edit", "uses" => "TagsController@edit"]);
        $route->any('/delete', ["as" => "admin.tags.delete", "uses" => "TagsController@delete"]);
        $route->any('/search', ["as" => "admin.tags.search", "uses" => "TagsController@search"]);
    });
});
