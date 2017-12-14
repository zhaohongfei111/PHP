<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-12-06 11:24:07 --- CRITICAL: ErrorException [ 2 ]: opendir(E:\wamp\www\kindergarden\media\comm\,E:\wamp\www\kindergarden\media\comm\) [function.opendir]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Communication.php [ 281 ] in file:line
2016-12-06 11:24:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'opendir(E:\wamp...', 'E:\wamp\www\kin...', 281, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Communication.php(281): opendir('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Communication.php(206): Controller_Communication->clearImgCache('fileRand1480988...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Communication->action_commFile()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Communication))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2016-12-06 11:24:23 --- CRITICAL: ErrorException [ 2 ]: opendir(E:\wamp\www\kindergarden\media\comm\,E:\wamp\www\kindergarden\media\comm\) [function.opendir]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Communication.php [ 281 ] in file:line
2016-12-06 11:24:23 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'opendir(E:\wamp...', 'E:\wamp\www\kin...', 281, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Communication.php(281): opendir('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Communication.php(206): Controller_Communication->clearImgCache('fileRand1480988...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Communication->action_commFile()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Communication))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in file:line