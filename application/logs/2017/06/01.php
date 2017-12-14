<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-01 17:59:41 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ãƒEï¿½ï¿½ï¿½,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ç”»åƒ) [function.rename]: Žw’è‚³‚ê‚½ƒtƒ@ƒCƒ‹‚ªŒ©‚Â‚©‚è‚Ü‚¹‚ñB (code: 2) ~ APPPATH\classes\Controller\Picshow.php [ 110 ] in file:line
2017-06-01 17:59:41 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(110): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-01 17:59:57 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ãƒEï¿½ï¿½ï¿½,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//aaa) [function.rename]: Žw’è‚³‚ê‚½ƒtƒ@ƒCƒ‹‚ªŒ©‚Â‚©‚è‚Ü‚¹‚ñB (code: 2) ~ APPPATH\classes\Controller\Picshow.php [ 110 ] in file:line
2017-06-01 17:59:57 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 110, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(110): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-01 18:00:22 --- CRITICAL: ErrorException [ 2 ]: unlink(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1/ãƒEï¿½ï¿½ï¿½) [function.unlink]: No such file or directory ~ APPPATH\classes\Controller\Picshow.php [ 168 ] in file:line
2017-06-01 18:00:22 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(E:\wamp\...', 'E:\wamp\www\kin...', 168, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(168): unlink('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_delFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line