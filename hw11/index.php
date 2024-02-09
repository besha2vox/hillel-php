<?php

define('APP_DIR', __DIR__ . '/');
define('SERVICES_DIR', APP_DIR . 'services/');
define('LOGS_DIR', APP_DIR . 'logs/');
define('LOG_FILE', 'logs.txt');

require SERVICES_DIR . 'index.php';

const COMMANDS = "List of commands: 
 - read (to view the latest logs);
 - write (to record logs);
 - exit (to exit the program);
 - help (to view commands)." . PHP_EOL;

function main(): void
{
    $firstLoop = true;

    while (true) {
        if($firstLoop) {
            echo COMMANDS;
            $firstLoop = false;
        } else {
            echo "Enter name of action: ";
        }

        $action = trim(fgets(STDIN));

        switch ($action) {
            case  'read':
                echo "Enter a number of lines to read: ";
                $number = (int)fgets(STDIN);
                echo readLogs($number);
                break;

            case 'write':
                echo "Enter a message to record: ";
                $message = trim(fgets(STDIN));
                echo "Enter a type of log: ";
                $type = trim(fgets(STDIN));
                writeLogs($message, $type);
                break;

            case 'exit':
                exit('The program is closed' . PHP_EOL);

            case 'help':
                echo COMMANDS;
                break;

            default:
                echo "Command '$action' not found" . PHP_EOL;
        }
    }
}

main();