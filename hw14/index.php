<?php

require __DIR__ . '/account.php';


function main()
{
    try {
        $account = new Account('4342 1234 5344 5142', 12589);

        actionAndLog($account, 'withdraw',1200);
        actionAndLog($account, 'getBalance');
        actionAndLog($account, 'replenish',1200);
        actionAndLog($account, 'getBalance');
    } catch (Exception $error) {
        print $error->getMessage();
    }
}

function actionAndLog(Account &$account, string $action, ?int $amount = null): void
{
    $account->$action($amount);
    echo match ($action) {
        'replenish' => "The account has been successfully deposited in the amount of 1245." . PHP_EOL,
        'withdraw' => "The amount of $amount was successfully withdrawn from the account." . PHP_EOL,
        'getBalance' => "Balance of your card (" . $account->getCardNumber() . "): " . $account->getbalance() . PHP_EOL,
        default => "Action $action not allowed!"
    };
}

main();