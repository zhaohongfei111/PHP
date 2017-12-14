<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-11-30 14:23:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::present() ~ APPPATH\classes\Model\socket.php [ 20 ] in file:line
2016-11-30 14:23:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 14:24:05 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::present() ~ APPPATH\classes\Model\socket.php [ 20 ] in file:line
2016-11-30 14:24:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 14:29:30 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-11-30 14:29:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #105, '192.168.100.240', '10001')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(20): socket->__construct('192.168.100.240', '10001')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(69): Controller_Socket->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Socket))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-11-30 14:41:55 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-11-30 14:41:55 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #105, '192.168.100.240', '10001')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(20): socket->__construct('192.168.100.240', '10001')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(69): Controller_Socket->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Socket))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-11-30 16:34:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_socket::socket_send() ~ APPPATH\classes\Controller\List.php [ 11 ] in file:line
2016-11-30 16:34:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:34:33 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_socket::socket_send() ~ APPPATH\classes\Controller\List.php [ 11 ] in file:line
2016-11-30 16:34:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:35:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_socket::socket_send() ~ APPPATH\classes\Controller\List.php [ 11 ] in file:line
2016-11-30 16:35:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:35:59 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_socket::socket_send() ~ APPPATH\classes\Controller\List.php [ 11 ] in file:line
2016-11-30 16:35:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:44:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_socket::socket_send_cmd() ~ APPPATH\classes\Controller\List.php [ 12 ] in file:line
2016-11-30 16:44:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:44:55 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:44:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:45:23 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:45:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:45:45 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:45:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:46:26 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:46:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:46:40 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:46:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:46:42 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socket_backwork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:46:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:47:26 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_socketBackWork' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 16:47:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 16:58:29 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Controller::__construct() must be an instance of Request, null given, called in E:\wamp\www\kindergarden\application\classes\Controller\Socket.php on line 25 and defined ~ SYSPATH\classes\Kohana\Controller.php [ 43 ] in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:58:29 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(43): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'E:\wamp\www\kin...', 43, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(25): Kohana_Controller->__construct(NULL, NULL)
#2 [internal function]: Controller_Socket->__construct(Object(Request), Object(Response))
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(96): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:58:52 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Controller::__construct() must be an instance of Request, null given, called in E:\wamp\www\kindergarden\application\classes\Controller\Socket.php on line 25 and defined ~ SYSPATH\classes\Kohana\Controller.php [ 43 ] in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:58:52 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(43): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'E:\wamp\www\kin...', 43, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(25): Kohana_Controller->__construct(NULL, NULL)
#2 [internal function]: Controller_Socket->__construct(Object(Request), Object(Response))
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(96): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:58:55 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Controller::__construct() must be an instance of Request, null given, called in E:\wamp\www\kindergarden\application\classes\Controller\Socket.php on line 25 and defined ~ SYSPATH\classes\Kohana\Controller.php [ 43 ] in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:58:55 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(43): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'E:\wamp\www\kin...', 43, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(25): Kohana_Controller->__construct(NULL, NULL)
#2 [internal function]: Controller_Socket->__construct(Object(Request), Object(Response))
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(96): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:59:48 --- CRITICAL: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Controller::__construct() must be an instance of Request, null given, called in E:\wamp\www\kindergarden\application\classes\Controller\Socket.php on line 25 and defined ~ SYSPATH\classes\Kohana\Controller.php [ 43 ] in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 16:59:48 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(43): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'E:\wamp\www\kin...', 43, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(25): Kohana_Controller->__construct(NULL, NULL)
#2 [internal function]: Controller_Socket->__construct(Object(Request), Object(Response))
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(96): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php:43
2016-11-30 17:00:08 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_scoket' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 17:00:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 17:00:19 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_scoket' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-11-30 17:00:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 17:28:10 --- CRITICAL: ErrorException [ 1 ]: Maximum function nesting level of '100' reached, aborting! ~ APPPATH\include\socket.php [ 35 ] in file:line
2016-11-30 17:28:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 17:37:00 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-11-30 17:37:00 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #103, '192.168.100.240', 10001)
#2 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(20): socket->__construct('192.168.100.240', 10001)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(69): Controller_Socket->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Socket))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-11-30 17:44:57 --- CRITICAL: ErrorException [ 1 ]: Maximum function nesting level of '100' reached, aborting! ~ APPPATH\include\socket.php [ 35 ] in file:line
2016-11-30 17:44:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-11-30 17:47:55 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\socket.php [ 35 ] in file:line
2016-11-30 17:47:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line