<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-01-24 15:30:29 --- CRITICAL: ErrorException [ 1 ]: Call to a member function set() on a non-object ~ APPPATH\classes\Controller\List.php [ 647 ] in file:line
2017-01-24 15:30:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-01-24 15:43:32 --- CRITICAL: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH\classes\Controller\List.php [ 645 ] in E:\wamp\www\kindergarden\application\classes\Controller\List.php:645
2017-01-24 15:43:32 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\List.php(645): Kohana_Core::error_handler(2048, 'Only variables ...', 'E:\wamp\www\kin...', 645, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_logPDF()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\List.php:645
2017-01-24 17:05:21 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:05:21 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:05:39 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:05:39 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:06:06 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:06:06 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:06:24 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:06:24 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:07:34 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:07:34 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:09:23 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:09:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:11:33 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:11:33 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(592): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:12:33 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:12:33 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(592): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:14:13 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:14:13 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(592): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:16:42 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:16:42 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(592): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:18:16 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:18:16 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(592): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:19:39 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:19:39 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:30 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:30 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:42 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:42 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:53 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:21:53 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:22:06 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:22:06 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:22:31 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:22:31 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:23:20 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1906 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:23:20 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1906): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1906, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1906
2017-01-24 17:24:55 --- CRITICAL: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\classes\Model\list.php [ 1907 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:1907
2017-01-24 17:24:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(1907): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\wamp\www\kin...', 1907, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\List.php(591): Model_list->log_Insert(Object(Request))
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_log_insert()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:1907