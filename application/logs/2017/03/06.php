<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-03-06 10:11:49 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Base_MonCost ~ APPPATH\classes\Controller\Administration.php [ 898 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:898
2017-03-06 10:11:49 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(898): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 898, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:898
2017-03-06 10:27:47 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Base_MonCost ~ APPPATH\classes\Controller\Administration.php [ 924 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:924
2017-03-06 10:27:47 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(924): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 924, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:924
2017-03-06 10:28:22 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\classes\Controller\Administration.php [ 927 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:927
2017-03-06 10:28:22 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(927): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 927, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:927
2017-03-06 10:42:51 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:42:51 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:42:56 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-03-06 10:42:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:43:17 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:43:17 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:43:23 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 16263 ] in file:line
2017-03-06 10:43:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:44:59 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:44:59 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:45:04 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-03-06 10:45:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:45:23 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:45:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:45:53 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 21162 ] in file:line
2017-03-06 10:45:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:46:05 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:46:05 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:46:35 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 21171 ] in file:line
2017-03-06 10:46:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:47:04 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:47:04 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:47:34 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 24064 ] in file:line
2017-03-06 10:47:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:47:47 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:47:47 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:47:53 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-03-06 10:47:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-06 10:48:06 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ALL ~ APPPATH\views\administration\invoiceAllPDF.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:48:06 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(106): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:106
2017-03-06 10:52:43 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\administration\invoiceAllPDF.php [ 1072 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:1072
2017-03-06 10:52:43 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php(1072): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 1072, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(954): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAllPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAllPDF.php:1072
2017-03-06 10:52:49 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-03-06 10:52:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line