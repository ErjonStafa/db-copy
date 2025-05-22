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
];
