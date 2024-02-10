<?php

function writeLogs(string $message, ?string $type = 'action', ?string $fileName = LOG_FILE): false | int
{
    $filePath = LOGS_DIR . $fileName;
    $date = date("d/m/Y H:i:s");
    $message = "- [$type] [$date] [$message]" . PHP_EOL;

    return file_put_contents($filePath, $message, FILE_APPEND);
}
