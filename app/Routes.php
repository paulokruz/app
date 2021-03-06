<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */


/** Define static routes. */

// Default Routing
Route::any('', function() {
    $content = __('Yep! It works.');

    /*
    $view = View::make('Default')
        ->shares('title', __('Welcome'))
        ->withContent($content);

    $template = Layout::make('default')->withContent($view);
    */

    $template = Layout::make('default')
        ->shares('title', __('Welcome'))
        ->nest('content', 'Default', array('content' => $content));

    return Response::make($template);
});

// The Framework's Language Changer.
Route::any('language/{locale}', array(
    'before' => 'referer',
    'uses'   => 'App\Controllers\Language@change'
));

/** End default Routes */
