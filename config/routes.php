<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
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
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
    $routes->connect('/', ['controller' => 'pages', 'action' => 'display', 'home']);
    $routes->connect('/users', ['controller' => 'users', 'action'=>'login']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/add', ['controller' => 'users', 'action' => 'add']);
    $routes->fallbacks(DashedRoute::class);
});

//in the mylogin/courses/view/id EXAMPLE mylogin/courses/view/5 
//will display all courses with course_id = 5
Router::scope('/view/:id', function($routes){
    $routes->connect('/', ['controller'=>'courses', 'action'=>'view'], ['id'=>'/d+'
                                                                       ,'pass'=>['id']]);
    $routes->connect('/', ['controller'=>'courses', 'action'=>'nextpage'], ['id'=>'/d+'
                                                                       ,'pass'=>['id']]);
    
});

Router::scope('/choose', function($routes){
    $routes->connect('/',['controller'=>'courses', 'action'=>'view']);
    $routes->connect('/',['controller'=>'courses', 'action'=>'viewprefereddays']);    
    
});



Plugin::routes();
