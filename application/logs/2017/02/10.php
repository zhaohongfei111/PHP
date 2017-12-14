<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-10 09:37:40 --- CRITICAL: ErrorException [ 8 ]: Undefined index: checkInfo ~ APPPATH\views\day_check\day_check_detail.php [ 143 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:143
2017-02-10 09:37:40 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(143): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 143, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(39): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:143
2017-02-10 10:04:01 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\views\day_check\day_check_detail.php [ 161 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:161
2017-02-10 10:04:01 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(161): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 161, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(39): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:161
2017-02-10 10:04:53 --- CRITICAL: ErrorException [ 8 ]: Undefined index: commInfo ~ APPPATH\classes\Controller\DayCheck.php [ 29 ] in E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php:29
2017-02-10 10:04:53 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(29): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 29, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php:29
2017-02-10 10:06:08 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\views\day_check\day_check_detail.php [ 161 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:161
2017-02-10 10:06:08 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(161): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 161, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(38): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:161