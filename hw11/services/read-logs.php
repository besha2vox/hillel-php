<?php

function readLogs(?int $lines_to_count = 1, ?string $fileName = LOG_FILE,): string
{
    $fileName = LOGS_DIR . $fileName;

    if (!is_readable($fileName)) {
        return "File with name $fileName not found!" . PHP_EOL;
    }

    $file = fopen($fileName, "r");
    if (!$file) {
        return "Could not open the file!";
    }

    $lines = '';
    $line_counter = 0;

    if ($lines_to_count <= 0) {
        $lines_to_count = 1;
    }

    while (!feof($file)) {
        $line = fgets($file);
        if ($line_counter < $lines_to_count) {
            $lines .= $line;
            $line_counter++;
        }
    }

    fclose($file);

    return $lines;
}
