<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-06-20 14:10:10 --- CRITICAL: ErrorException [ 8 ]: Undefined index: goSchool_Date ~ APPPATH\views\list\busList.php [ 42 ] in E:\wamp\www\kindergarden\application\views\list\busList.php:42
2017-06-20 14:10:10 --- DEBUG: #0 E:\wamp\www\kindergarden\application\views\list\busList.php(42): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 42, Array)
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(62): include('E:\wamp\www\kin...')
#2 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(359): Kohana_View::capture('E:\wamp\www\kin...', Array)
#3 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 E:\wamp\www\kindergarden\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\wamp\www\kindergarden\application\classes\Controller\List.php(878): Kohana_Response->body(Object(View))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_busList()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#9 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#12 {main} in E:\wamp\www\kindergarden\application\views\list\busList.php:42
2017-06-20 14:19:37 --- CRITICAL: ErrorException [ 8 ]: Undefined index: GoSchool ~ APPPATH\classes\Model\list.php [ 2493 ] in E:\wamp\www\kindergarden\application\classes\Model\list.php:2493
2017-06-20 14:19:37 --- DEBUG: #0 E:\wamp\www\kindergarden\application\classes\Model\list.php(2493): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\wamp\www\kin...', 2493, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\list.php(2502): Model_list->Validation_bus(Object(Request))
#2 E:\wamp\www\kindergarden\application\classes\Controller\List.php(908): Model_list->bus_Data(Object(Request))
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_List->action_busInsert()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_List))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\application\classes\Model\list.php:2493
2017-06-20 14:39:11 --- CRITICAL: View_Exception [ 0 ]: The requested view day_check/dayCheckDetailprint2 could not be found ~ SYSPATH\classes\Kohana\View.php [ 265 ] in E:\wamp\www\kindergarden\system\classes\Kohana\View.php:145
2017-06-20 14:39:11 --- DEBUG: #0 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(145): Kohana_View->set_filename('day_check/dayCh...')
#1 E:\wamp\www\kindergarden\system\classes\Kohana\View.php(30): Kohana_View->__construct('day_check/dayCh...', NULL)
#2 E:\wamp\www\kindergarden\application\classes\Controller\Daycheck.php(334): Kohana_View::factory('day_check/dayCh...')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_DayCheck->action_dayCheckDetailprint2()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_DayCheck))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\system\classes\Kohana\View.php:145