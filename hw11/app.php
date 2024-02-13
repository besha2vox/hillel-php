<?php

require_once SERVICES_DIR . 'index.php';

class App
{
    private object $reader;
    private object $recorder;

    public function __construct(object $reader, object $recorder)
    {
        $this->reader = $reader;
        $this->recorder = $recorder;
    }
    public function read(): string
    {
        echo "Enter a number of lines to read: ";
        $number = (int)fgets(STDIN);
        return $this->reader->main($number);
    }

    public function write()
    {
        echo "Enter a message to record: ";
        $message = trim(fgets(STDIN));
        echo "Enter a type of log: ";
        $type = trim(fgets(STDIN));
        $this->recorder->main($message, $type);
    }
}