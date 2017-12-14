<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-05-25 10:58:39 --- CRITICAL: Database_Exception [ 1103 ]: Incorrect table name '' [ SELECT * FROM `` WHERE `Select_group_year` = '2017-0-C1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251
2017-05-25 10:58:39 --- DEBUG: #0 E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\guide.php(7): Kohana_Database_Query->execute()
#2 E:\wamp\www\kindergarden\application\classes\Controller\Guide.php(29): Model_guide->getguideYear('2017-0-C1')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Guide->action_guide()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Guide))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251
2017-05-25 10:59:14 --- CRITICAL: Database_Exception [ 1103 ]: Incorrect table name '' [ SELECT * FROM `` WHERE `Select_group_year` = '2017-0-C1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251
2017-05-25 10:59:14 --- DEBUG: #0 E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\guide.php(7): Kohana_Database_Query->execute()
#2 E:\wamp\www\kindergarden\application\classes\Controller\Guide.php(29): Model_guide->getguideYear('2017-0-C1')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Guide->action_guide()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Guide))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251
2017-05-25 10:59:48 --- CRITICAL: Database_Exception [ 1103 ]: Incorrect table name '' [ SELECT * FROM `` WHERE `Select_group_year` = '2017-0-C1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251
2017-05-25 10:59:48 --- DEBUG: #0 E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 E:\wamp\www\kindergarden\application\classes\Model\guide.php(7): Kohana_Database_Query->execute()
#2 E:\wamp\www\kindergarden\application\classes\Controller\Guide.php(29): Model_guide->getguideYear('2017-0-C1')
#3 E:\wamp\www\kindergarden\system\classes\Kohana\Controller.php(86): Controller_Guide->action_guide()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client\Internal.php(99): ReflectionMethod->invoke(Object(Controller_Guide))
#6 E:\wamp\www\kindergarden\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\wamp\www\kindergarden\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 E:\wamp\www\kindergarden\index.php(118): Kohana_Request->execute()
#9 {main} in E:\wamp\www\kindergarden\modules\database\classes\Kohana\Database\Query.php:251