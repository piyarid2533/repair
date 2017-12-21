<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-03-05 12:22:07 +07:00 --- error: Uncaught Kohana_404_Exception: The page you requested, order_report/history_user, could not be found. in file system/core/Kohana.php on line 841
2011-03-05 12:24:22 +07:00 --- error: Uncaught Kohana_404_Exception: The page you requested, order_repair/report_repair, could not be found. in file system/core/Kohana.php on line 841
2011-03-05 12:56:57 +07:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order_repair_date BETWEEN '2554-3-5' AND '2554-3-5' ORDER BY id DESC' at line 2 - 
            SELECT * FROM order_repairs
            WHERE 1 > 0AND order_repair_date BETWEEN '2554-3-5' AND '2554-3-5' ORDER BY id DESC in file system/libraries/drivers/Database/Mysql.php on line 371
2011-03-05 12:57:17 +07:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Unknown column 'order_repair_date' in 'where clause' - 
            SELECT * FROM order_repairs
            WHERE 1 > 0 AND order_repair_date BETWEEN '2554-3-5' AND '2554-3-5' ORDER BY id DESC in file system/libraries/drivers/Database/Mysql.php on line 371
2011-03-05 13:29:13 +07:00 --- error: Uncaught Kohana_Exception: The requested view, order_repair/stete_repair, could not be found in file system/core/Kohana.php on line 1162
