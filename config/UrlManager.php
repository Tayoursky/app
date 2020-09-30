<?php


\vendor\Router::add('^$', ['controller' => 'task', 'action' => 'index']);
\vendor\Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


