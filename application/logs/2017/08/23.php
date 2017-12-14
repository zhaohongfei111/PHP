<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-08-23 17:50:03 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Birthday ~ APPPATH\classes\Controller\Child.php [ 782 ] in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:782
2017-08-23 17:50:03 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(782): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 782, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_health_insert()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:782