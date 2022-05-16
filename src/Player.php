<?php

namespace App;

class Player
{
    public function __construct(public string $name, public int $pennies)
    {

    }

    public function bankroll(): int
    {
        return $this->pennies;
    }

    public function bankrupt(): bool
    {
        return $this->pennies === 0;
    }

    public function givePenny(Player $p2): void
    {
        $this->pennies--;
        $p2->pennies++;
    }
}