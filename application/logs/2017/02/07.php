<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-07 12:28:35 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: sleep_Num ~ APPPATH\views\list\listNapCheck.php [ 90 ] in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:90
2017-02-07 12:28:35 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(90): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 90, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(337): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:90
2017-02-07 12:28:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: sleep_Num ~ APPPATH\views\list\listNapCheck.php [ 90 ] in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:90
2017-02-07 12:28:36 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(90): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 90, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(337): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:90
2017-02-07 12:29:05 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 128194561 bytes) ~ APPPATH\views\list\listNapCheck.php [ 103 ] in file:line
2017-02-07 12:29:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-07 15:01:09 --- CRITICAL: ErrorException [ 2 ]: array_key_exists() expects parameter 2 to be array, null given ~ APPPATH\views\list\listNapCheck.php [ 90 ] in file:line
2017-02-07 15:01:09 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', 'E:\wamp\www\kin...', 90, Array)
#1 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(90): array_key_exists('C1', NULL)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\List.php(336): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-02-07 15:28:47 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\list\monDetail_List.php [ 28 ] in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:28
2017-02-07 15:28:47 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\monDetail_List.php(28): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 28, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(279): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_monDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:28
2017-02-07 15:28:55 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\list\monDetail_List.php [ 28 ] in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:28
2017-02-07 15:28:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\monDetail_List.php(28): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 28, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(279): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_monDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\monDetail_List.php:28