<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-12-12 14:55:24 --- CRITICAL: ErrorException [ 2 ]: array_filter() expects parameter 1 to be array, string given ~ APPPATH\views\child\invoicePDF.php [ 220 ] in file:line
2016-12-12 14:55:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_filter() ...', 'E:\wamp\www\kin...', 220, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(220): array_filter(';', NULL)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(996): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2016-12-12 14:55:54 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 21716 ] in file:line
2016-12-12 14:55:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-12-12 14:56:01 --- CRITICAL: ErrorException [ 2 ]: array_filter() expects parameter 1 to be array, string given ~ APPPATH\views\child\invoicePDF.php [ 220 ] in file:line
2016-12-12 14:56:01 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_filter() ...', 'E:\wamp\www\kin...', 220, Array)
#1 E:\wamp\www\kindergarden\application\views\child\invoicePDF.php(220): array_filter(';', NULL)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(996): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2016-12-12 14:56:31 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 3007 ] in file:line
2016-12-12 14:56:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-12-12 15:09:25 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\classes\Controller\Child.php [ 986 ] in file:line
2016-12-12 15:09:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 986, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(986): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2016-12-12 15:14:48 --- CRITICAL: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, string given ~ APPPATH\classes\Controller\Child.php [ 987 ] in file:line
2016-12-12 15:14:48 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', 'E:\wamp\www\kin...', 987, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(987): number_format('')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_invoicePDF()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line