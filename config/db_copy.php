<?php

return [
    /**
     * Url path to the page that copies the database tables
     */
    'url_path'   => 'db/copy',

    /**
     * Middlewares for url_path
     */
    'middlewares' => ['web'],

    /**
     * Route name for url_path
     */
    'route_name' => 'db.copy',

    /**
     * Url path to where the user is redirected back
     */
    'fallback_url' => '/',

    /**
     * For performance reasons you can change how many rows can be displayed without pagination being active.
     */
    'paginate_if_there_are_more_than' => 100,

    /**
     * Change how many rows are displayed in pagination
     */
    'per_page' => 100,
];
