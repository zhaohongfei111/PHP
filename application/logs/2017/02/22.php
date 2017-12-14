<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-02-22 14:24:14 --- CRITICAL: ErrorException [ 8 ]: Undefined index: ID ~ APPPATH\classes\Model\master.php [ 904 ] in E:\wamp\www\kindergarden\application\classes\Model\master.php:904
2017-02-22 14:24:14 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\master.php(904): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 904, Array)
#1 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-02')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#8 {main} in E:\wamp\www\kindergarden\application\classes\Model\master.php:904
2017-02-22 14:49:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: val_Child ~ APPPATH\views\administration\invoiceAll.php [ 106 ] in E:\wamp\www\kindergarden\application\views\administration\invoiceAll.php:106
2017-02-22 14:49:46 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\administration\invoiceAll.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\wamp\www\kin...', 106, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(801): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\administration\invoiceAll.php:106
2017-02-22 16:12:32 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ APPPATH\views\administration\invoiceAll.php [ 115 ] in file:line
2017-02-22 16:12:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line