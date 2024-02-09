<?php

function writeLogs(string $message, ?string $type = 'action', ?string $fileName = LOG_FILE): void
{
    $filePath = LOGS_DIR . $fileName;
    $date = date("dd/m/y H:i:s");
    $fileContents = file_get_contents($filePath);
    $message = "[$type] [$date] [$message]\n" . $fileContents;
    file_put_contents($filePath, $message);
}
