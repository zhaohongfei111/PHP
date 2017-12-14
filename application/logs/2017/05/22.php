<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-05-22 09:56:37 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ffff ~ APPPATH\classes\Controller\Administration.php [ 476 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 09:56:37 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(476): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 476, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_recogProject()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 09:56:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ffff ~ APPPATH\classes\Controller\Administration.php [ 476 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 09:56:50 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(476): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 476, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_recogProject()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 09:57:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: ffff ~ APPPATH\classes\Controller\Administration.php [ 476 ] in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 09:57:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(476): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 476, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_recogProject()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Administration.php:476
2017-05-22 11:25:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Child.php [ 1140 ] in file:line
2017-05-22 11:25:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-05-22 11:33:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: file_name ~ APPPATH\classes\Controller\Child.php [ 1122 ] in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1122
2017-05-22 11:33:18 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1122): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 1122, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->teee('G:/grandFather/')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1122
2017-05-22 11:34:21 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Child.php [ 1131 ] in file:line
2017-05-22 11:34:21 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 1131, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1131): iconv('utf-8', 'gb2312', '???')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->teee('G:/grandFather/')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2017-05-22 11:42:59 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Child.php [ 1125 ] in file:line
2017-05-22 11:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 1125, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1125): iconv('gb2312', 'utf-8', '???')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->refresh('G:/grandFather')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2017-05-22 11:44:55 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Child.php [ 1125 ] in file:line
2017-05-22 11:44:55 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 1125, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1125): iconv('gb2312', 'utf-8', '???')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->refresh('G:/grandFather')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2017-05-22 11:45:38 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Child.php [ 1125 ] in file:line
2017-05-22 11:45:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 1125, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1125): iconv('gb2312', 'utf-8', '???')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->refresh('G:/grandFather')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2017-05-22 11:46:04 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Child.php [ 1125 ] in file:line
2017-05-22 11:46:04 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 1125, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1125): iconv('gb2312', 'utf-8', '???')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1111): Controller_Child->refresh('G:/grandFather')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line