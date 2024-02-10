<?php

define('APP_DIR', __DIR__ . '/');
define('SERVICES_DIR', APP_DIR . 'services/');
define('LOGS_DIR', APP_DIR . 'logs/');
define('LOG_FILE', 'logs.txt');

const COMMANDS = "List of commands: 
 - read (to view the latest logs);
 - write (to record logs);
 - exit (to exit the program);
 - help (to view commands)." . PHP_EOL;