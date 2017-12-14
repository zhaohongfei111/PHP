<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-08-24 10:05:02 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 97 ] in file:line
2017-08-24 10:05:02 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 97, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(97): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 10:05:32 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 12432 ] in file:line
2017-08-24 10:05:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 10:40:15 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 71 ] in file:line
2017-08-24 10:40:15 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 71, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(71): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 10:40:45 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 2985 ] in file:line
2017-08-24 10:40:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 10:49:06 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 201 ] in file:line
2017-08-24 10:49:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 201, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(201): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 10:49:36 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 12100 ] in file:line
2017-08-24 10:49:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 10:49:36 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 201 ] in file:line
2017-08-24 10:49:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 201, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(201): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 14:32:50 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 97 ] in file:line
2017-08-24 14:32:50 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 97, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(97): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 14:33:20 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 12205 ] in file:line
2017-08-24 14:33:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 14:34:49 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 97 ] in file:line
2017-08-24 14:34:49 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 97, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(97): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 14:35:19 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 2997 ] in file:line
2017-08-24 14:35:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 14:47:48 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 97 ] in file:line
2017-08-24 14:47:48 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 97, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(97): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 14:48:18 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 2933 ] in file:line
2017-08-24 14:48:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 15:16:38 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 227 ] in file:line
2017-08-24 15:16:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 227, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(227): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 15:17:08 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 11763 ] in file:line
2017-08-24 15:17:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 15:17:17 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\views\child\invoicePDF.php [ 227 ] in file:line
2017-08-24 15:17:17 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 227, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(227): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(995): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-08-24 15:17:47 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 23928 ] in file:line
2017-08-24 15:17:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-08-24 15:47:20 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 101 ] in file:line
2017-08-24 15:47:20 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 101, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(101): iconv('UTF-8', 'shift-jis', '?????????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line