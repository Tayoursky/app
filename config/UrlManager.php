<?php


\vendor\Router::add('^$', ['controller' => 'Site', 'action' => 'index']);
\vendor\Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


