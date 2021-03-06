<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', 'Pages::display');

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});


// If you need a different set of middleware or none at all,
// open new scope and define routes there.


$routes->scope('/api', function (RouteBuilder $builder) {
    // Students endpoints
    $builder->connect('/students', ['controller' => 'Students', 'action' => 'index']);
    $builder->connect('/students/add', 'Students::add');
    $builder->connect('/students/view/*', 'Students::view');
    $builder->connect('/students/edit/*', 'Students::edit');
    $builder->connect('/students/delete/*', 'Students::delete');

    // Professors endpoints
    $builder->connect('/professors', ['controller' => 'Professors', 'action' => 'index']);
    $builder->connect('/professors/add', 'Professors::add');
    $builder->connect('/professors/view/*', 'Professors::view');
    $builder->connect('/professors/edit/*', 'Professors::edit');
    $builder->connect('/professors/delete/*', 'Professors::delete');

    // Courses endpoints
    $builder->connect('/courses', ['controller' => 'Courses', 'action' => 'index']);
    $builder->connect('/courses/add', 'Courses::add');
    $builder->connect('/courses/view/*', 'Courses::view');
    $builder->connect('/courses/edit/*', 'Courses::edit');
    $builder->connect('/courses/delete/*', 'Courses::delete');

    // Schedule endpoints
    $builder->connect('/schedule', ['controller' => 'Schedule', 'action' => 'index']);
    $builder->connect('/schedule/add', 'Schedule::add');
    $builder->connect('/schedule/view/*', 'Schedule::view');
    $builder->connect('/schedule/edit/*', 'Schedule::edit');
    $builder->connect('/schedule/delete/*', 'Schedule::delete');

    // Student Schedule endpoints
    $builder->connect('/studentschedule', ['controller' => 'StudentSchedule', 'action' => 'index']);
    $builder->connect('/studentschedule/add', 'StudentSchedule::add');
    $builder->connect('/studentschedule/view/*', 'StudentSchedule::view');
    $builder->connect('/studentschedule/edit/*', 'StudentSchedule::edit');
    $builder->connect('/studentschedule/delete/*', 'StudentSchedule::delete');
});
