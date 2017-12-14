<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-12-02 11:50:52 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-12-02 11:50:52 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #111, '192.168.100.241', '10001')
#2 E:\wamp\www\kindergarden\application\classes\Model\socketBackWork.php(25): socket->__construct('192.168.100.241', '10001')
#3 E:\wamp\www\kindergarden\application\classes\Controller\List.php(12): Model_socketBackWork->socket_send_cmd()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listAll()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2016-12-02 11:51:38 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-12-02 11:51:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #111, '192.168.100.241', '10001')
#2 E:\wamp\www\kindergarden\application\classes\Model\socketBackWork.php(25): socket->__construct('192.168.100.241', '10001')
#3 E:\wamp\www\kindergarden\application\classes\Controller\List.php(12): Model_socketBackWork->socket_send_cmd()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listAll()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2016-12-02 12:09:37 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-12-02 12:09:37 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #103, '192.168.100.241', 10001)
#2 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(20): socket->__construct('192.168.100.241', 10001)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(69): Controller_Socket->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Socket))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-12-02 12:10:05 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-12-02 12:10:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #103, '192.168.100.241', 10001)
#2 E:\wamp\www\kindergarden\application\classes\Controller\Socket.php(20): socket->__construct('192.168.100.241', 10001)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(69): Controller_Socket->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Socket))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-12-02 12:10:44 --- CRITICAL: ErrorException [ 2 ]: socket_connect() [function.socket-connect]: unable to connect [0]: 接続済みの呼び出し先が一定の時間を過ぎても正しく応答しなかったため、接続できませんでした。または接続済みのホストが応答しなかったため、確立された接続は失敗しました。
 ~ APPPATH\include\socket.php [ 8 ] in file:line
2016-12-02 12:10:44 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'socket_connect(...', 'E:\wamp\www\kin...', 8, Array)
#1 E:\wamp\www\kindergarden\application\include\socket.php(8): socket_connect(Resource id #111, '192.168.100.241', '10001')
#2 E:\wamp\www\kindergarden\application\classes\Model\socketBackWork.php(25): socket->__construct('192.168.100.241', '10001')
#3 E:\wamp\www\kindergarden\application\classes\Controller\List.php(12): Model_socketBackWork->socket_send_cmd()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listAll()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2016-12-02 12:14:50 --- CRITICAL: ErrorException [ 1 ]: Call to a member function sendData() on a non-object ~ APPPATH\classes\Controller\Socket.php [ 113 ] in file:line
2016-12-02 12:14:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-12-02 12:17:02 --- CRITICAL: ErrorException [ 1 ]: Call to a member function sendData() on a non-object ~ APPPATH\classes\Model\socketBackWork.php [ 105 ] in file:line
2016-12-02 12:17:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line