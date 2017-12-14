<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-05-15 13:48:59 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 138 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:138
2017-05-15 13:48:59 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(138): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 138, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(180): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailPDF2()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:138
2017-05-15 13:49:03 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-05-15 13:49:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line