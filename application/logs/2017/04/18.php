<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-04-18 11:18:33 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_list::listSleepNapCheckUpdatee() ~ APPPATH\classes\Controller\List.php [ 488 ] in file:line
2017-04-18 11:18:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:39:31 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Sleep_list ~ APPPATH\views\list\listNapCheck.php [ 114 ] in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:114
2017-04-18 11:39:31 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(114): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 114, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(478): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:114
2017-04-18 11:42:04 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Sleep_list ~ APPPATH\views\list\listNapCheck.php [ 114 ] in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:114
2017-04-18 11:42:04 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(114): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 114, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(480): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:114
2017-04-18 11:46:23 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Sleep_list ~ APPPATH\views\list\listNapCheck.php [ 138 ] in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:138
2017-04-18 11:46:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listNapCheck.php(138): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 138, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(480): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listNapCheck()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\listNapCheck.php:138
2017-04-18 11:50:54 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:50:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:04 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:12 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:29 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:33 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:38 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:51:44 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:51:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:56:05 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2075 ] in file:line
2017-04-18 11:56:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:56:42 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2076 ] in file:line
2017-04-18 11:56:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:57:52 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2078 ] in file:line
2017-04-18 11:57:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:58:59 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2078 ] in file:line
2017-04-18 11:58:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 11:59:34 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2078 ] in file:line
2017-04-18 11:59:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 12:00:11 --- CRITICAL: ErrorException [ 1 ]: Function name must be a string ~ APPPATH\classes\Model\list.php [ 2077 ] in file:line
2017-04-18 12:00:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 12:12:06 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\Model\list.php [ 2057 ] in file:line
2017-04-18 12:12:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 12:42:04 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_list::getChildrenDetailByClass() ~ APPPATH\classes\Model\dayCheck.php [ 46 ] in file:line
2017-04-18 12:42:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 12:48:59 --- CRITICAL: ErrorException [ 2 ]: array_key_exists() expects parameter 2 to be array, string given ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 268 ] in file:line
2017-04-18 12:48:59 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', 'E:\wamp\www\kin...', 268, Array)
#1 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(268): array_key_exists(0, 'maxauth')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(131): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-04-18 12:49:29 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 5453 ] in file:line
2017-04-18 12:49:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 12:49:42 --- CRITICAL: ErrorException [ 2 ]: array_key_exists() expects parameter 2 to be array, string given ~ APPPATH\views\day_check\dayCheckDetailPDF1.php [ 268 ] in file:line
2017-04-18 12:49:42 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', 'E:\wamp\www\kin...', 268, Array)
#1 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF1.php(268): array_key_exists(0, 'maxauth')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(131): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2017-04-18 13:55:05 --- CRITICAL: ErrorException [ 8 ]: Undefined index: sleepNapCheck ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 113 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:113
2017-04-18 13:55:05 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(113): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 113, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(228): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF3()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:113
2017-04-18 13:55:09 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-04-18 13:55:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 14:01:34 --- CRITICAL: ErrorException [ 8 ]: Undefined index: napCheck ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 187 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:187
2017-04-18 14:01:34 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(187): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 187, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(230): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF3()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:187
2017-04-18 14:01:38 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 16263 ] in file:line
2017-04-18 14:01:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-04-18 14:01:46 --- CRITICAL: ErrorException [ 8 ]: Undefined index: napCheck ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 187 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:187
2017-04-18 14:01:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(187): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 187, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(230): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF3()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:187