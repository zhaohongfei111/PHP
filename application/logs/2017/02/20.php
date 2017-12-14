<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-20 10:19:15 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: Y ~ APPPATH\classes\Controller\List.php [ 160 ] in E:\wamp\www\kindergarden\application\classes\Controller\List.php:160
2017-02-20 10:19:15 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\List.php(160): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 160, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\List.php:160
2017-02-20 10:19:37 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: yearMonDay ~ APPPATH\views\list\listExtension.php [ 20 ] in E:\wamp\www\kindergarden\application\views\list\listExtension.php:20
2017-02-20 10:19:37 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtension.php(20): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 20, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(170): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listExtension.php:20
2017-02-20 10:29:42 --- CRITICAL: ErrorException [ 1 ]: Cannot use string offset as an array ~ APPPATH\views\list\listExtension.php [ 102 ] in file:line
2017-02-20 10:29:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:02 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:09 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:42 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:42 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:43 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:43 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:50 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 10:48:51 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\views\list\listExtension.php [ 94 ] in file:line
2017-02-20 10:48:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:10:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: child_Info ~ APPPATH\classes\Controller\List.php [ 175 ] in E:\wamp\www\kindergarden\application\classes\Controller\List.php:175
2017-02-20 11:10:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\List.php(175): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 175, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\List.php:175
2017-02-20 11:10:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: child_Info ~ APPPATH\classes\Controller\List.php [ 175 ] in E:\wamp\www\kindergarden\application\classes\Controller\List.php:175
2017-02-20 11:10:27 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\List.php(175): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 175, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\List.php:175
2017-02-20 11:19:12 --- CRITICAL: ErrorException [ 8 ]: Undefined index: yearJap_EnterDate ~ APPPATH\views\list\listExtension.php [ 107 ] in E:\wamp\www\kindergarden\application\views\list\listExtension.php:107
2017-02-20 11:19:12 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtension.php(107): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 107, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(184): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listExtension.php:107
2017-02-20 11:20:28 --- CRITICAL: ErrorException [ 8 ]: Undefined index: inputDate ~ APPPATH\views\list\listExtension.php [ 108 ] in E:\wamp\www\kindergarden\application\views\list\listExtension.php:108
2017-02-20 11:20:28 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtension.php(108): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 108, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(184): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listExtension.php:108
2017-02-20 11:26:32 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:26:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:27:18 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:27:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:27:41 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:27:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:27:42 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:27:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:27:43 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:27:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:27:43 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 93 ] in file:line
2017-02-20 11:27:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:28:25 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 133 ] in file:line
2017-02-20 11:28:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 11:28:26 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\views\list\listExtension.php [ 133 ] in file:line
2017-02-20 11:28:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-20 14:59:09 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Child_1_Base ~ APPPATH\classes\Controller\List.php [ 168 ] in E:\wamp\www\kindergarden\application\classes\Controller\List.php:168
2017-02-20 14:59:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\List.php(168): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 168, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtension()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\List.php:168