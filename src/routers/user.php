<?php
$router->map('GET', '/user', 'UserController#index', 'index');
$router->map('GET', '/user/[i:id]', 'UserController#show', 'user-show');
$router->map('GET', '/user/create', 'UserController#create', 'user-create');
$router->map('POST', '/user', 'UserController#post');
$router->map('DELETE', '/user/[i:id]', 'UserController#delete');
$router->map('GET', '/user/[i:id]/edit', 'UserController#edit');
$router->map('PUT', '/user/[i:id]', 'UserController#put');