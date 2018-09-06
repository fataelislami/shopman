<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-06 11:08:54 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\shopman\system\database\drivers\mysqli\mysqli_driver.php 201
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-06 11:08:54 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\shopman\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-09-06 11:08:54 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\shopman\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-09-06 11:08:54 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\shopman\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-09-06 11:08:54 --> Unable to connect to the database
ERROR - 2018-09-06 11:08:54 --> Unable to connect to the database
ERROR - 2018-09-06 11:10:30 --> 404 Page Not Found: /index
ERROR - 2018-09-06 11:11:52 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\shopman\system\core\Common.php 597
ERROR - 2018-09-06 11:11:52 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\shopman\system\core\Common.php 597
ERROR - 2018-09-06 11:13:25 --> 404 Page Not Found: /index
ERROR - 2018-09-06 11:29:04 --> Severity: Notice --> Undefined property: stdClass::$id_chatbo C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 31
ERROR - 2018-09-06 11:29:04 --> Severity: Notice --> Undefined property: stdClass::$expite_token C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 33
ERROR - 2018-09-06 11:29:05 --> Severity: Notice --> Undefined property: stdClass::$id_chatbo C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 31
ERROR - 2018-09-06 11:29:05 --> Severity: Notice --> Undefined property: stdClass::$expite_token C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 33
ERROR - 2018-09-06 11:29:13 --> Severity: Notice --> Undefined property: stdClass::$expite_token C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 33
ERROR - 2018-09-06 11:29:14 --> Severity: Notice --> Undefined property: stdClass::$expite_token C:\xampp\htdocs\shopman\application\modules\Superadmin\views\chatbot\chatbot_list.php 33
ERROR - 2018-09-06 11:30:22 --> Query error: Unknown table 'u6545471_shopman.chartbot' - Invalid query: SELECT `chartbot`.*, `admin`.`nama` as `admin`, `superadmin`.`nama` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:31:02 --> Query error: Unknown table 'u6545471_shopman.chartbot' - Invalid query: SELECT `chartbot`.*, `admin`.`nama` as `admin`, `superadmin`.`nama` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:31:05 --> Query error: Unknown table 'u6545471_shopman.chartbot' - Invalid query: SELECT `chartbot`.*, `admin`.`nama` as `admin`, `superadmin`.`nama` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:31:26 --> Query error: Unknown table 'u6545471_shopman.chartbot' - Invalid query: SELECT `chartbot`.*
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:32:13 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\shopman\application\modules\Superadmin\models\Chatbot_model.php 22
ERROR - 2018-09-06 11:35:28 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\shopman\application\modules\Superadmin\models\Chatbot_model.php 22
ERROR - 2018-09-06 11:35:45 --> Query error: Unknown column 'admin.nama' in 'field list' - Invalid query: SELECT `chatbot`.*, `admin`.`nama` as `admin`, `superadmin`.`nama` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:37:36 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\shopman\application\modules\Superadmin\models\Chatbot_model.php 21
ERROR - 2018-09-06 11:38:10 --> Query error: Unknown column 'admin.name' in 'field list' - Invalid query: SELECT `chatbot`.*, `admin`.`name` as `admin`, `superadmin`.`name` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:39:38 --> Query error: Unknown column 'admin.name' in 'field list' - Invalid query: SELECT `chatbot`.*, `admin`.`name` as `admin`, `superadmin`.`name` as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.name as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC' at line 1 - Invalid query: SELECT `chatbot`.`* ,admin`.`name as admin,superadmin`.name as `superadmin`
FROM `chatbot`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:43:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.name as `superadmin`
FROM `chatbot`
JOIN `admin` ON `admin`.`id_admin` = `chatb' at line 1 - Invalid query: SELECT `chatbot`.`* ,admin`.`name as admin,superadmin`.name as `superadmin`
FROM `chatbot`
JOIN `admin` ON `admin`.`id_admin` = `chatbot`.`id_admin`
JOIN `superadmin` ON `superadmin`.`id_superadmin` = `chatbot`.`id_superadmin`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:43:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.name as `superadmin`
FROM `chatbot`
JOIN `admin` ON `admin`.`id_admin` = `chatb' at line 1 - Invalid query: SELECT `chatbot`.`* , admin`.`name as admin, superadmin`.name as `superadmin`
FROM `chatbot`
JOIN `admin` ON `admin`.`id_admin` = `chatbot`.`id_admin`
JOIN `superadmin` ON `superadmin`.`id_superadmin` = `chatbot`.`id_superadmin`
ORDER BY `id_chatbot` DESC
ERROR - 2018-09-06 11:45:28 --> Severity: error --> Exception: syntax error, unexpected ')' C:\xampp\htdocs\shopman\application\modules\Superadmin\models\Chatbot_model.php 21
ERROR - 2018-09-06 11:46:27 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\shopman\application\modules\Superadmin\models\Chatbot_model.php 24
