<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-02 10:06:21 --- CRITICAL: ErrorException [ 2 ]: fileatime() [function.fileatime]: stat failed for E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1/„Åó„Å¶„Åè„Å†„Åï„ÅÑ ~ APPPATH\classes\Controller\Picshow.php [ 210 ] in file:line
2017-06-02 10:06:21 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fileatime() [<a...', 'E:\wamp\www\kin...', 210, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(210): fileatime('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:08:08 --- CRITICAL: ErrorException [ 2 ]: iconv() expects parameter 3 to be string, array given ~ APPPATH\views\picShow\privatePic.php [ 52 ] in file:line
2017-06-02 10:08:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'iconv() expects...', 'E:\wamp\www\kin...', 52, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(52): iconv('shift-jis', 'UTF-8', Array)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(236): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 10:14:55 --- CRITICAL: ErrorException [ 2 ]: unlink(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1/Á∏∫Âä±‚ÄªÁ∏∫‰∏ä‚ñ°Á∏∫ËºîÔºû) [function.unlink]: No such file or directory ~ APPPATH\classes\Controller\Picshow.php [ 169 ] in file:line
2017-06-02 10:14:55 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(E:\wamp\...', 'E:\wamp\www\kin...', 169, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(169): unlink('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_delFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:27:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: string ~ APPPATH\classes\Controller\Child.php [ 1109 ] in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1109
2017-06-02 10:27:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1109
2017-06-02 10:41:12 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 196 ] in file:line
2017-06-02 10:41:12 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 196, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(196): iconv('UTF-8', 'shift-jis', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:41:28 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 196 ] in file:line
2017-06-02 10:41:28 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 196, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(196): iconv('UTF-8', 'shift-jis', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:43:46 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 10:43:46 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('UTF-8', 'shift-jis', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:44:17 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 10:44:17 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('UTF-8', 'shift-jis', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:44:18 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 10:44:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('UTF-8', 'shift-jis', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:44:42 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 10:44:42 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('shift-jis', 'UTF-8', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:44:50 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 10:44:50 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('shift-jis', 'UTF-8', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:52:02 --- CRITICAL: ErrorException [ 2 ]: unlink(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1/Á∏∫Âä±‚ÄªÁ∏∫‰∏ä‚ñ°Á∏∫ËºîÔºû) [function.unlink]: No such file or directory ~ APPPATH\classes\Controller\Picshow.php [ 171 ] in file:line
2017-06-02 10:52:02 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(E:\wamp\...', 'E:\wamp\www\kin...', 171, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(171): unlink('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_delFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:55:23 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 76 ] in file:line
2017-06-02 10:55:23 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 76, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(76): iconv('UTF-8', 'shift-jis', '/??????????????...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 10:55:25 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 76 ] in file:line
2017-06-02 10:55:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 76, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(76): iconv('UTF-8', 'shift-jis', '/??????????????...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:02:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_PUBLIC ~ APPPATH\classes\Controller\Picshow.php [ 97 ] in file:line
2017-06-02 11:02:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-02 11:02:35 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_PUBLIC ~ APPPATH\classes\Controller\Picshow.php [ 97 ] in file:line
2017-06-02 11:02:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-02 11:02:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_PUBLIC ~ APPPATH\classes\Controller\Picshow.php [ 97 ] in file:line
2017-06-02 11:02:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-02 11:02:48 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_PUBLIC ~ APPPATH\classes\Controller\Picshow.php [ 97 ] in file:line
2017-06-02 11:02:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-06-02 11:08:03 --- CRITICAL: ErrorException [ 2 ]: log() expects parameter 1 to be double, string given ~ APPPATH\classes\Controller\Picshow.php [ 79 ] in file:line
2017-06-02 11:08:03 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'log() expects p...', 'E:\wamp\www\kin...', 79, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(79): log('/VKtH')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:10:33 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 197 ] in file:line
2017-06-02 11:10:33 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 197, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(197): iconv('UTF-8', 'shift-jis', '/???V???K???t??...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:15:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 79 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:79
2017-06-02 11:15:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(79): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 79, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:79
2017-06-02 11:16:36 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 79 ] in file:line
2017-06-02 11:16:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 79, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(79): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:17:21 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 80 ] in file:line
2017-06-02 11:17:21 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 80, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(80): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:20:06 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:20:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:20:52 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:20:52 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:21:54 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:21:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:22:36 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:22:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:22:46 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:22:46 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:23:08 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:23:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:23:23 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 82 ] in file:line
2017-06-02 11:23:23 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 82, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(82): iconv('UTF-8', 'shift-jis', '???V???K???t???...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:42:01 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 210 ] in file:line
2017-06-02 11:42:01 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 210, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(210): iconv('UTF-8', 'shift-jis', '/???E???V???E??...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:44:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 94 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:44:44 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 94, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 94 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:04 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 94, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:24 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 94 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:24 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 94, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 94 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:32 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 94, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: dir_short_code ~ APPPATH\classes\Controller\Picshow.php [ 94 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:45:55 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(94): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 94, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:94
2017-06-02 11:52:42 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 84 ] in file:line
2017-06-02 11:52:42 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 84, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(84): iconv('UTF-8', 'shift-jis', '?V?K?t?H??')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:52:54 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 84 ] in file:line
2017-06-02 11:52:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 84, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(84): iconv('UTF-8', 'shift-jis', '?V?K?t?H??')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:53:07 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 84 ] in file:line
2017-06-02 11:53:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 84, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(84): iconv('UTF-8', 'shift-jis', '?V?K?t?H??')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:53:57 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 84 ] in file:line
2017-06-02 11:53:57 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 84, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(84): iconv('UTF-8', 'shift-jis', '????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 11:54:33 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an incomplete multibyte character in input string ~ APPPATH\views\picShow\privatePic.php [ 42 ] in file:line
2017-06-02 11:54:33 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(42): iconv('shift-jis', 'UTF-8', '/??????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(256): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 11:54:43 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an incomplete multibyte character in input string ~ APPPATH\views\picShow\privatePic.php [ 42 ] in file:line
2017-06-02 11:54:43 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(42): iconv('shift-jis', 'UTF-8', '/??????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(256): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 11:54:59 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an incomplete multibyte character in input string ~ APPPATH\views\picShow\privatePic.php [ 42 ] in file:line
2017-06-02 11:54:59 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(42): iconv('shift-jis', 'UTF-8', '/??????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(256): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 11:55:04 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an incomplete multibyte character in input string ~ APPPATH\views\picShow\privatePic.php [ 42 ] in file:line
2017-06-02 11:55:04 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(42): iconv('shift-jis', 'UTF-8', '/??????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(256): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 11:58:04 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an incomplete multibyte character in input string ~ APPPATH\views\picShow\privatePic.php [ 42 ] in file:line
2017-06-02 11:58:04 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\application\views\picShow\privatePic.php(42): iconv('shift-jis', 'UTF-8', '/??????')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#4 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#6 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(257): Kohana_Response->body(Object(View))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#8 [internal function]: Kohana_Controller->execute()
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2017-06-02 12:07:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: serverOScode ~ APPPATH\classes\Controller\Picshow.php [ 77 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:07:10 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(77): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 77, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:08:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: serverOScode ~ APPPATH\classes\Controller\Picshow.php [ 77 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:08:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(77): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 77, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:09:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: serverOScode ~ APPPATH\classes\Controller\Picshow.php [ 77 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:09:36 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(77): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 77, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:77
2017-06-02 12:51:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: fileName ~ APPPATH\classes\Controller\Picshow.php [ 47 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:47
2017-06-02 12:51:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(47): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 47, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_saveImg()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:47
2017-06-02 12:58:24 --- CRITICAL: ErrorException [ 2 ]: mkdir() [function.mkdir]: File exists ~ APPPATH\classes\Controller\Picshow.php [ 115 ] in file:line
2017-06-02 12:58:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mkdir() [<a hre...', 'E:\wamp\www\kin...', 115, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(115): mkdir('E:\wamp\www\kin...', 511, true)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_addNewFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 13:39:13 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ÉeÉXÉg,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//   ) [function.rename]: ÉtÉ@ÉCÉãñºÅAÉfÉBÉåÉNÉgÉäñºÅAÇ‹ÇΩÇÕÉ{ÉäÉÖÅ[ÉÄ ÉâÉxÉãÇÃç\ï∂Ç™ä‘à·Ç¡ÇƒÇ¢Ç‹Ç∑ÅB (code: 123) ~ APPPATH\classes\Controller\Picshow.php [ 173 ] in file:line
2017-06-02 13:39:13 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 173, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(173): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 13:39:24 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ÉeÉXÉg,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//      ) [function.rename]: ÉtÉ@ÉCÉãñºÅAÉfÉBÉåÉNÉgÉäñºÅAÇ‹ÇΩÇÕÉ{ÉäÉÖÅ[ÉÄ ÉâÉxÉãÇÃç\ï∂Ç™ä‘à·Ç¡ÇƒÇ¢Ç‹Ç∑ÅB (code: 123) ~ APPPATH\classes\Controller\Picshow.php [ 173 ] in file:line
2017-06-02 13:39:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 173, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(173): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 13:43:04 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ÉeÉXÉg,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//        ) [function.rename]: ÉtÉ@ÉCÉãñºÅAÉfÉBÉåÉNÉgÉäñºÅAÇ‹ÇΩÇÕÉ{ÉäÉÖÅ[ÉÄ ÉâÉxÉãÇÃç\ï∂Ç™ä‘à·Ç¡ÇƒÇ¢Ç‹Ç∑ÅB (code: 123) ~ APPPATH\classes\Controller\Picshow.php [ 173 ] in file:line
2017-06-02 13:43:04 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 173, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(173): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 13:43:38 --- CRITICAL: ErrorException [ 2 ]: rename(E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//ÉeÉXÉg,E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1//    ) [function.rename]: ÉtÉ@ÉCÉãñºÅAÉfÉBÉåÉNÉgÉäñºÅAÇ‹ÇΩÇÕÉ{ÉäÉÖÅ[ÉÄ ÉâÉxÉãÇÃç\ï∂Ç™ä‘à·Ç¡ÇƒÇ¢Ç‹Ç∑ÅB (code: 123) ~ APPPATH\classes\Controller\Picshow.php [ 173 ] in file:line
2017-06-02 13:43:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:\wamp\...', 'E:\wamp\www\kin...', 173, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(173): rename('E:\wamp\www\kin...', 'E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-06-02 14:34:34 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ':', expecting ',' or ';' ~ APPPATH\views\guide\guide.php [ 86 ] in file:line
2017-06-02 14:34:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line