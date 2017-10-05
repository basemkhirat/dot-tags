<?php

/*
 * WEB
 */
Route::group(array(
    "prefix" => ADMIN,
    "middleware" => ["web", "auth", "can:tags.manage"],
        ), function($route) {
        $route->group(array("prefix" => "tags"), function($route) {
            $route->any('/', array("as" => "admin.tags.show", "uses" => "Dot\Tags\Controllers\TagsController@index"));
            $route->any('/create', array("as" => "admin.tags.create", "uses" => "Dot\Tags\Controllers\TagsController@create"));
            $route->any('/{tag_id}/edit', array("as" => "admin.tags.edit", "uses" => "Dot\Tags\Controllers\TagsController@edit"));
            $route->any('/delete', array("as" => "admin.tags.delete", "uses" => "Dot\Tags\Controllers\TagsController@delete"));
            $route->any('/search', array("as" => "admin.tags.search", "uses" => "Dot\Tags\Controllers\TagsController@search"));
        });
});


/*
 * API
 */
Route::group([
    "prefix" => API,
    "middleware" => ["auth:api"]
], function ($route) {
    $route->get("/tags/show", "Dot\Tags\Controllers\TagsApiController@show");
    $route->post("/tags/create", "Dot\Tags\Controllers\TagsApiController@create");
    $route->post("/tags/update", "Dot\Tags\Controllers\TagsApiController@update");
    $route->post("/tags/destroy", "Dot\Tags\Controllers\TagsApiController@destroy");
});


