<?php

class Account
{
    private string $cardNumber;
    private int $balance;

    public function __construct(string $cardNumber, int $startBalance)
    {
        if ($startBalance < 0) {
            throw new Exception("The balance on a debit card cannot be less than 0!");
        }

        $this->setCardNumber($cardNumber);
        $this->setBalance($startBalance);
    }

    public function getbalance(): int
    {
        return $this->balance;
    }

    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function replenish(int $amount):void
    {
        if ($amount <= 0) {
            throw new Exception("To replenish the card, the replenishment amount must be greater than 0!");
        }

        $this->setBalance($this->balance + $amount);
    }

    public function withdraw(int $amount): void
    {
        $balance = $this->getbalance();
        if ( $balance < $amount) {
            throw new Exception(
                "Your account balance is $balance."
                . PHP_EOL
                . "You cannot withdraw more than you have in your account."
                .PHP_EOL
            );
        }

        $this->setBalance($balance - $amount);
    }

    protected function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    private function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }
}