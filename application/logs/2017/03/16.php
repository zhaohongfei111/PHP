<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-03-16 10:32:40 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\views\list\listExtensionPDF.php [ 69 ] in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:69
2017-03-16 10:32:40 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php(69): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 69, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\application\classes\Controller\List.php(251): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_listExtensionPDF()
#6 [internal function]: Kohana_Controller->execute()
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#11 {main} in E:\wamp\www\kindergarden\application\views\list\listExtensionPDF.php:69
2017-03-16 10:33:10 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\mpdf.php [ 6733 ] in file:line
2017-03-16 10:33:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-16 10:47:31 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\classes\ttfontsuni.php [ 242 ] in file:line
2017-03-16 10:47:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-16 10:47:31 --- CRITICAL: ErrorException [ 1 ]: Maximum execution time of 30 seconds exceeded ~ APPPATH\include\mpdf\classes\ttfontsuni.php [ 4479 ] in file:line
2017-03-16 10:47:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2017-03-16 15:48:21 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2029 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2029
2017-03-16 15:48:21 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2029): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2029, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(907): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2029
2017-03-16 15:48:42 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:48:42 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:53:34 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:53:34 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:53:36 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:53:36 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:54:21 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:54:21 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:54:56 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:54:56 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:55:23 --- CRITICAL: ErrorException [ 8 ]: Undefined index:  ~ APPPATH\classes\Model\child.php [ 2030 ] in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030
2017-03-16 15:55:23 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\child.php(2030): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2030, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\master.php(909): Model_child->getMonCost('5', '2017-03')
#2 E:\wamp\www\kindergarden\application\classes\Controller\Administration.php(790): Model_master->getInvoiceAll('2017-03')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Administration->action_invoiceAll()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Administration))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\child.php:2030