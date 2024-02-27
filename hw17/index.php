<?php

require __DIR__ . '/traits/Validator.php';
require __DIR__ . '/schemas/validationSchemas.php';
require __DIR__ . '/controllers/UserController.php';
require __DIR__ . '/controllers/AuthController.php';

echo PHP_EOL . "VALIDE DATA:" . PHP_EOL;

try {
    $authController = new AuthController;
    $authController->register([
        'email' => 'test@mail.com',
        'password' => 'qwerty1234%$Q'
    ]);
    echo "Registration is successful!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}

try {
    $authController = new AuthController;
    $authController->register([
        'email' => 'test@mail.com',
        'password' => 'qwerty1234%$Q'
    ]);
    echo "Login successful!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}

try {
    $userController = new UserController;
    $userController->update(['name' => 'Serhii']);
    echo "User data has been successfully edited!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}

echo PHP_EOL . "INVALIDE DATA:" . PHP_EOL;

try {
    $authController = new AuthController;
    $authController->register([
        'email' => 'test',
        'password' => 'test'
    ]);
    echo "Registration is successful!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}

try {
    $authController = new AuthController;
    $authController->register([
        'email' => 'test',
        'password' => 'test'
    ]);
    echo "Login successful!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}

try {
    $userController = new UserController;
    $userController->update(['name' => 1]);
    echo "User data has been successfully edited!" . PHP_EOL;
} catch (Exception $error) {
    echo $error->getMessage();
}
