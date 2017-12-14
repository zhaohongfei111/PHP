<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-07 11:50:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: val_r2 ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 129 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:50:51 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(129): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 129, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:50:55 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-06-07 11:50:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-07 11:50:59 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: val_r2 ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 129 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:50:59 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(129): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 129, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:51:03 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\classes\cssmgr.php [ 16263 ] in file:line
2017-06-07 11:51:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-07 11:51:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: val_r2 ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 129 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:51:36 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(129): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 129, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:52:05 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 30490 ] in file:line
2017-06-07 11:52:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-07 11:52:06 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: val_r2 ~ APPPATH\views\day_check\dayCheckDetailPDF3.php [ 129 ] in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 11:52:06 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php(129): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 129, Array)
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
#11 {main} in E:\wamp\www\kindergarden\application\views\day_check\dayCheckDetailPDF3.php:129
2017-06-07 12:08:43 --- CRITICAL: ErrorException [ 8 ]: Undefined index: yes ~ APPPATH\views\list\listExtensionPDF.php [ 79 ] in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:79
2017-06-07 12:08:43 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php(79): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 79, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\List.php(259): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtensionPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:79
2017-06-07 12:08:48 --- CRITICAL: ErrorException [ 1 ]: Allowed memory size of 536870912 bytes exhausted (tried to allocate 261904 bytes) ~ APPPATH\include\mpdf\mpdf.php [ 14487 ] in file:line
2017-06-07 12:08:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-07 12:09:51 --- CRITICAL: ErrorException [ 8 ]: Undefined index: yes ~ APPPATH\views\list\listExtensionPDF.php [ 79 ] in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:79
2017-06-07 12:09:51 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php(79): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 79, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\List.php(259): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtensionPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:79
2017-06-07 12:18:55 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\list\listExtensionPDF.php [ 68 ] in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:68
2017-06-07 12:18:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php(68): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 68, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\List.php(260): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtensionPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:68