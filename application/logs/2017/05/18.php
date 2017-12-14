<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-05-18 10:37:56 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 22 ] in file:line
2017-05-18 10:37:56 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 22, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(22): iconv('gb2312', 'utf-8', '?O??_??.apk')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 10:41:07 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 23 ] in file:line
2017-05-18 10:41:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 23, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(23): iconv('gb2312', 'utf-8', '?O??_??.apk')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 10:44:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: files1 ~ APPPATH\classes\Controller\Picshow.php [ 37 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:37
2017-05-18 10:44:09 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 37, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:37
2017-05-18 10:44:36 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 23 ] in file:line
2017-05-18 10:44:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 23, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(23): iconv('utf-8', 'gb2312', '?O??_??.apk')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 10:44:57 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 23 ] in file:line
2017-05-18 10:44:57 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 23, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(23): iconv('utf-8', 'gb2312', '?O??_??.apk')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 11:40:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';', expecting ')' ~ APPPATH\classes\Controller\Picshow.php [ 35 ] in file:line
2017-05-18 11:40:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-05-18 12:11:05 --- CRITICAL: ErrorException [ 2 ]: fileatime() [function.fileatime]: stat failed for E:\wamp\www\kindergarden/media/uploadfile/picShow/privatePic/1/??后.png ~ APPPATH\classes\Controller\Picshow.php [ 35 ] in file:line
2017-05-18 12:11:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fileatime() [<a...', 'E:\wamp\www\kin...', 35, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(35): fileatime('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:14:45 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 32 ] in file:line
2017-05-18 12:14:45 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 32, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(32): iconv('utf-8', 'gb2312', '???@.png')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:17:39 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 30 ] in file:line
2017-05-18 12:17:39 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 30, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(30): iconv('gb2312', 'utf-8', '???@.png')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:18:53 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 31 ] in file:line
2017-05-18 12:18:53 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(31): iconv('gb2312', 'utf-8', '???@.png')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:22:19 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Wrong charset, conversion from `utf-8' to `ugb2312' is not allowed ~ APPPATH\classes\Controller\Picshow.php [ 31 ] in file:line
2017-05-18 12:22:19 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(31): iconv('utf-8', 'ugb2312', '.')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:22:56 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Wrong charset, conversion from `utf-8' to `ugb2312' is not allowed ~ APPPATH\classes\Controller\Picshow.php [ 31 ] in file:line
2017-05-18 12:22:56 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(31): iconv('utf-8', 'ugb2312', '.')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:23:13 --- CRITICAL: ErrorException [ 8 ]: iconv() [function.iconv]: Detected an illegal character in input string ~ APPPATH\classes\Controller\Picshow.php [ 31 ] in file:line
2017-05-18 12:23:13 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'iconv() [<a hre...', 'E:\wamp\www\kin...', 31, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(31): iconv('utf-8', 'gb2312', '???@.png')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 12:46:59 --- CRITICAL: ErrorException [ 8 ]: Undefined index: goodsName ~ APPPATH\views\picShow\uploadImg.php [ 5 ] in E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php:5
2017-05-18 12:46:59 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php(5): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 5, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(21): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_uploadImg()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php:5
2017-05-18 12:47:29 --- CRITICAL: ErrorException [ 8 ]: Undefined index: goodsName ~ APPPATH\views\picShow\uploadImg.php [ 46 ] in E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php:46
2017-05-18 12:47:29 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php(46): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 46, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(21): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_uploadImg()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\picShow\uploadImg.php:46
2017-05-18 14:23:14 --- CRITICAL: ErrorException [ 8 ]: Undefined index: txt_Search ~ APPPATH\classes\Controller\Picshow.php [ 54 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:54
2017-05-18 14:23:14 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(54): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 54, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:54
2017-05-18 14:27:57 --- CRITICAL: ErrorException [ 2 ]: mkdir() [function.mkdir]: Invalid argument ~ APPPATH\classes\Controller\Picshow.php [ 60 ] in file:line
2017-05-18 14:27:57 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mkdir() [<a hre...', 'E:\wamp\www\kin...', 60, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(60): mkdir('E:\wamp\www\kin...', 511, true)
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_privatePic()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:15:25 --- CRITICAL: ErrorException [ 2 ]: rename(test3,test4) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in file:line
2017-05-18 17:15:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(test3,te...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): rename('test3', 'test4')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_renameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:17:56 --- CRITICAL: ErrorException [ 2 ]: rename(test3,11) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in file:line
2017-05-18 17:17:56 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(test3,11...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): rename('test3', '11')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:18:40 --- CRITICAL: ErrorException [ 2 ]: rename(test3,11) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in file:line
2017-05-18 17:18:40 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(test3,11...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): rename('test3', '11')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:25:45 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant dir_new - assumed 'dir_new' ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:25:45 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:28:30 --- CRITICAL: ErrorException [ 2 ]: rename(gg.txt,qq.txt) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:28:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(gg.txt,q...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('gg.txt', 'qq.txt')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:29:35 --- CRITICAL: ErrorException [ 2 ]: rename(E:/wamp/www/kindergarden/media/uploadfile/picShow/privatePic/1/text3,E:/wamp/www/kindergarden/media/uploadfile/picShow/privatePic/1/text4) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:29:35 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:/wamp/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('E:/wamp/www/kin...', 'E:/wamp/www/kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:30:39 --- CRITICAL: ErrorException [ 2 ]: rename(E:/wamp/www/kindergarden/media/uploadfile/picShow/privatePic/1/text3,E:/wamp/www/kindergarden/media/uploadfile/picShow/privatePic/1/text4) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:30:39 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(E:/wamp/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('E:/wamp/www/kin...', 'E:/wamp/www/kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:33:08 --- CRITICAL: ErrorException [ 2 ]: rename(D:/test11,D:/test) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:33:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(D:/test1...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('D:/test11', 'D:/test')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:33:08 --- CRITICAL: ErrorException [ 2 ]: rename(D:/test11,D:/test) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:33:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(D:/test1...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('D:/test11', 'D:/test')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:33:09 --- CRITICAL: ErrorException [ 2 ]: rename(D:/test11,D:/test) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:33:09 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(D:/test1...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('D:/test11', 'D:/test')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:33:10 --- CRITICAL: ErrorException [ 2 ]: rename(D:/test11,D:/test) [function.rename]: 指定されたファイルが見つかりません。 (code: 2) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:33:10 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(D:/test1...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('D:/test11', 'D:/test')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:34:46 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant dir_new - assumed 'dir_new' ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:34:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:35:40 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant dir_new - assumed 'dir_new' ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:35:40 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:40:17 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant dir_new - assumed 'dir_new' ~ APPPATH\classes\Controller\Picshow.php [ 81 ] in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:40:17 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php(81): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\wamp\www\kin...', 81, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Picshow->action_reNameFile()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Picshow))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Picshow.php:81
2017-05-18 17:43:35 --- CRITICAL: ErrorException [ 2 ]: rename(G:/Maps/FrozenThrone,G:/Maps/yu) [function.rename]: アクセスが拒否されました。 (code: 5) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(G:/Maps/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('G:/Maps/FrozenT...', 'G:/Maps/yu')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:43:48 --- CRITICAL: ErrorException [ 2 ]: rename(G:/Maps/FrozenThrone,G:/Maps/yu) [function.rename]: アクセスが拒否されました。 (code: 5) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:43:48 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(G:/Maps/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('G:/Maps/FrozenT...', 'G:/Maps/yu')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:43:48 --- CRITICAL: ErrorException [ 2 ]: rename(G:/Maps/FrozenThrone,G:/Maps/yu) [function.rename]: アクセスが拒否されました。 (code: 5) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:43:48 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(G:/Maps/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('G:/Maps/FrozenT...', 'G:/Maps/yu')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:43:50 --- CRITICAL: ErrorException [ 2 ]: rename(G:/Maps/FrozenThrone,G:/Maps/yu) [function.rename]: アクセスが拒否されました。 (code: 5) ~ APPPATH\classes\Controller\Child.php [ 1109 ] in file:line
2017-05-18 17:43:50 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'rename(G:/Maps/...', 'E:\wamp\www\kin...', 1109, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1109): rename('G:/Maps/FrozenT...', 'G:/Maps/yu')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2017-05-18 17:52:44 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant dir_new - assumed 'dir_new' ~ APPPATH\classes\Controller\Child.php [ 1117 ] in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1117
2017-05-18 17:52:44 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Controller\Child.php(1117): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\wamp\www\kin...', 1117, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Child->action_test1()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Child))
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#7 {main} in E:\wamp\www\kindergarden\application\classes\Controller\Child.php:1117