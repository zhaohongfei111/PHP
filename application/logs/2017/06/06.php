<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-06 14:57:46 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 75 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:75
2017-06-06 14:57:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(75): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 75, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:75
2017-06-06 14:58:16 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 7614 ] in file:line
2017-06-06 14:58:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-06 14:58:19 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 2 ~ APPPATH\views\day_check\dayCheckDetailPDF2.php [ 75 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:75
2017-06-06 14:58:19 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php(75): Kohana_Core::error_handler(8, 'Undefined offse...', 'E:\wamp\www\kin...', 75, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF2.php:75