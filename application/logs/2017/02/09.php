<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-09 12:41:14 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: Y ~ APPPATH\classes\Controller\DayCheck.php [ 19 ] in E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php:19
2017-02-09 12:41:14 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 19, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php:19
2017-02-09 12:41:39 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: yearMonDay ~ APPPATH\views\day_check\day_check_detail.php [ 30 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:30
2017-02-09 12:41:39 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(30): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 30, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\DayCheck.php(32): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetail()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:30
2017-02-09 16:03:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: child_Info ~ APPPATH\views\day_check\day_check_detail.php [ 131 ] in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:131
2017-02-09 16:03:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php(131): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 131, Array)
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
#12 {main} in E:\wamp\www\kindergarden\application\views\day_check\day_check_detail.php:131