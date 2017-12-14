<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-15 09:35:55 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Humidity ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 120 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:120
2017-02-15 09:35:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(120): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 120, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:120
2017-02-15 09:35:59 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 16263 ] in file:line
2017-02-15 09:35:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 09:36:11 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Humidity ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 120 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:120
2017-02-15 09:36:11 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(120): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 120, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:120
2017-02-15 10:19:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected $end ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 332 ] in file:line
2017-02-15 10:19:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 10:20:02 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected $end ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 332 ] in file:line
2017-02-15 10:20:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 10:20:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected $end ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 332 ] in file:line
2017-02-15 10:20:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 12:13:01 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Body_Temp ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 78 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:13:01 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(78): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 78, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:13:31 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 12177 ] in file:line
2017-02-15 12:13:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 12:15:27 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Body_Temp ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 78 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:15:27 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(78): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 78, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:15:57 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 31647 ] in file:line
2017-02-15 12:15:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 12:16:13 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Body_Temp ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 78 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:16:13 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(78): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 78, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:16:43 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\classes\otl.php [ 5342 ] in file:line
2017-02-15 12:16:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 12:16:55 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Body_Temp ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 78 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:16:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(78): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 78, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(129): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php:78
2017-02-15 12:41:26 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: parameter ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 31 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:31
2017-02-15 12:41:26 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(31): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(178): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF2()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:31
2017-02-15 12:41:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: parameter ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 31 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:31
2017-02-15 12:41:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(31): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(178): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF2()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:31
2017-02-15 13:55:57 --- CRITICAL: ErrorException [ 8 ]: Undefined index: napCheck ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 115 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:115
2017-02-15 13:55:57 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(115): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 115, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(177): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF2()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:115
2017-02-15 13:56:01 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-02-15 13:56:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 13:56:24 --- CRITICAL: ErrorException [ 8 ]: Undefined index: napCheck ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 115 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:115
2017-02-15 13:56:24 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(115): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 115, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(177): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF2()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:115
2017-02-15 14:53:39 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 106 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:106
2017-02-15 14:53:39 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(106): Kohana_Core::error_handler(8, 'Array to string...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(228): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF3()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:106
2017-02-15 14:53:43 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 16263 ] in file:line
2017-02-15 14:53:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-15 14:54:24 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 106 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:106
2017-02-15 14:54:24 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(106): Kohana_Core::error_handler(8, 'Array to string...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(228): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF3()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:106