<?php
define("ROOT", dirname(__DIR__));
define("MAIN_PATH", $_ENV['MODE'] === 'dev' ? $_ENV['SITE_ROOT_DEV'] :  $_ENV["SITE_ROOT"] );
