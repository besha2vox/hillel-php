<?php

require __DIR__ . '/constants.php';
require __DIR__ . '/app.php';

function main(): void
{
    $app = new App(new Reader, new Recorder);

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
                try {
                    echo  $app->read();
                } catch (Exception $error) {
                    echo $error->getMessage();
                }
                break;

            case 'write':
                try {
                    $app->write();
                    echo "The recording was successful!" . PHP_EOL;
                } catch (Exception $error) {
                    echo $error->getMessage();
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