<?php
/**
 * modify the router and get it working as you want
 * 
 * 
 */
$router = new Codefii\Http\Router();
$router->setNamespace('App\Sys');
$router->routes('/','FiiA::ready');