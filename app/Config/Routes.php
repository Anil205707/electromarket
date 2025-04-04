<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('products', 'ProductController::index');
$routes->get('products/create', 'ProductController::create');
$routes->post('products/store', 'ProductController::store');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');

$routes->get('register', 'UserAuth::register');
$routes->post('register/save', 'UserAuth::registerSave');
$routes->get('login', 'UserAuth::login');
$routes->post('login/check', 'UserAuth::loginCheck');
$routes->get('logout', 'UserAuth::logout');

$routes->get('admin', 'AdminController::index');
$routes->get('admin/dashboard', 'AdminController::index');

$routes->get('product/(:num)', 'ProductController::show/$1');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');

$routes->get('products/search', 'ProductController::search'); // ✅ This is your working search route
$routes->get('products/filter', 'ProductController::filter');
$routes->get('products/page/(:num)', 'ProductController::paginateAjax/$1');
$routes->get('products/live-search', 'ProductController::liveSearch');

$routes->get('category', 'Category::index');
$routes->get('categories', 'CategoryController::index');
$routes->get('product/category/(:num)', 'ProductController::category/$1');

$routes->get('cart/add/(:num)', 'Cart::add/$1');
$routes->get('cart/view', 'Cart::view');
$routes->get('cart/increase/(:num)', 'Cart::increase/$1');
$routes->get('cart/decrease/(:num)', 'Cart::decrease/$1');
$routes->get('cart/remove/(:num)', 'Cart::remove/$1');

$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/placeOrder', 'Checkout::placeOrder');

$routes->setAutoRoute(true); // Optional fallback

