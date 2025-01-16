<?php
$router->map('GET', '/group', 'GroupController#index');
$router->map('GET', '/group/[i:id]', 'GroupController#show');
$router->map('GET', '/group/create', 'GroupController#create');
$router->map('POST', '/group', 'GroupController#post');
$router->map('DELETE', '/group/[i:id]', 'GroupController#delete');
$router->map('GET', '/group/[i:id]/edit', 'GroupController#edit');
$router->map('PUT', '/group/[i:id]', 'GroupController#put');
$router->map('GET', '/group/[i:id]/users', 'GroupController#users');
$router->map('POST', '/group/[i:id]/users', 'GroupController#postusers');