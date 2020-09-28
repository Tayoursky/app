<?php


\vendor\Router::add('^$', ['controller' => 'Task', 'action' => 'index']);
\vendor\Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


