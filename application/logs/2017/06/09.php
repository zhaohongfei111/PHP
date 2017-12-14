<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-09 11:38:42 --- CRITICAL: ErrorException [ 8 ]: Undefined index: weeek ~ APPPATH\views\list\monDetail_List.php [ 102 ] in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:102
2017-06-09 11:38:42 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\monDetail_List.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 102, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(431): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_monDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:102