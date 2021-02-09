<?php
<<<<<<< HEAD
define("MAIN_PATH", "http://" . $_SERVER["SERVER_NAME"]);
=======
define("ROOT", dirname(__DIR__));
define("MAIN_PATH", $_ENV['MODE'] === 'dev' ? $_ENV['SITE_ROOT_DEV'] :  $_ENV["SITE_ROOT"] );
>>>>>>> 7123258d3323a4cabefb53870665f6dcebcbed49
