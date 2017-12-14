<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-13 09:53:32 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\day_check\day_check_detail.php [ 87 ] in file:line
2017-02-13 09:53:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-13 10:29:28 --- CRITICAL: View_Exception [ 0 ]: The requested view daycheck/dayCheckDetailPDF1 could not be found ~ SYSPATH\classes\Kohana\View.php [ 265 ] in E:\wamp\www\kindergarden\system\classes\Kohana\View.php:145
2017-02-13 10:29:28 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(145): Kohana_View->set_filename('daycheck/dayChe...')
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(30): Kohana_View->__construct('daycheck/dayChe...', NULL)
#2 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(62): Kohana_View::factory('daycheck/dayChe...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\View.php:145
2017-02-13 12:20:51 --- CRITICAL: ErrorException [ 2 ]: file_get_contents(mpdfstyletables.css) [function.file-get-contents]: failed to open stream: No such file or directory ~ APPPATH\classes\Controller\DayCheck.php [ 71 ] in file:line
2017-02-13 12:20:51 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'file_get_conten...', 'E:\wamp\www\kin...', 71, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(71): file_get_contents('mpdfstyletables...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-02-13 12:25:55 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 19102 ] in file:line
2017-02-13 12:25:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-02-13 15:31:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: key1 ~ APPPATH\views\day_check\day_check_detail.php [ 26 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:26
2017-02-13 15:31:27 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 26, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(44): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:26
2017-02-13 15:32:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: key1 ~ APPPATH\views\day_check\day_check_detail.php [ 26 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:26
2017-02-13 15:32:29 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 26, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(44): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:26
2017-02-13 16:05:00 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: InputDate ~ APPPATH\classes\Model\dayCheck.php [ 107 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:107
2017-02-13 16:05:00 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 107, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:107
2017-02-13 16:10:50 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 108 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:10:50 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(108): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 108, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:12:09 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 108 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:12:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(108): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 108, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:12:50 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 108 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:12:50 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(108): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 108, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:108
2017-02-13 16:14:48 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 110 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:14:48 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(110): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:17:08 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 110 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:17:08 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(110): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:18:27 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 110 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:18:27 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(110): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:18:40 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 110 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:18:40 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(110): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:20:14 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\classes\Model\dayCheck.php [ 110 ] in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 16:20:14 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php(110): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(52): Model_dayCheck->dayCheckDetailUpdate(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailUpdate()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\dayCheck.php:110
2017-02-13 17:01:05 --- CRITICAL: ErrorException [ 8 ]: Undefined index: Time_Morning ~ APPPATH\views\day_check\day_check_detail.php [ 51 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:51
2017-02-13 17:01:05 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(51): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 51, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(44): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:51