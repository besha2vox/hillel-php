<?php

require __DIR__ . '/constants.php';
require SERVICES_DIR . 'index.php';

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
                if (!writeLogs($message, $type)) {
                    echo "The recording failed";
                }
                break;

            case 'help':
                echo COMMANDS;
                break;

            case 'exit':
                exit('The program is closed' . PHP_EOL);

            default:
                echo "Command '$action' not found" . PHP_EOL;
        }
    }
}

main();