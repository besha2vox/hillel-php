<?php

function writeLogs(string $message, ?string $type = 'action', ?string $fileName = LOG_FILE): false | int
{
    $filePath = LOGS_DIR . $fileName;
    $date = date("d/m/Y H:i:s");
    replaceTilda($type);
    replaceTilda($message);
    $message = "~ [$type] [$date] [$message]" . PHP_EOL;

    return file_put_contents($filePath, $message, FILE_APPEND);
}

function replaceTilda(string &$str): void
{
    if (str_contains('~', $str)) {
        $str = str_replace('~', '∼', $str);
    }
}