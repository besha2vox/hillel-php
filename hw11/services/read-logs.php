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
    if ($lines_to_count <= 0) {
        $lines_to_count = 1;
    }

    $lines = '';
    $line_counter = 0;

    fseek($file, 0, SEEK_END);

    $pointer = 0;
    while (true) {
        if (!ftell($file) || $line_counter >= $lines_to_count) {
            break;
        }

        $char = fread($file, 1);

        if ($char === '~') {
            $lines .= trim(fgets($file)) .PHP_EOL;
            $line_counter++;
        }

        fseek($file, $pointer, SEEK_END);
        $pointer--;
    }

    fclose($file);
    return trim($lines) . PHP_EOL;
}

