<?php

require __DIR__ . '/worker.php';

try {
    $worker = new Worker('Serhii', 'developer');
    $worker->printWorkerInfo();
} catch (Exception $error) {
    echo '1. ' . $error->getMessage();
}

try {
    $worker2 = new Worker('Serhii', 'miner');
} catch (Exception $error) {
    echo '2. ' . $error->getMessage();
}

try {
    $worker3 = new Worker('1', 'miner');
} catch (Exception $error) {
    echo '3. ' . $error->getMessage();
}