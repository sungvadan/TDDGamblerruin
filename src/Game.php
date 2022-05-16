<?php

namespace App;


class Game
{
    private const HEAD = 'HEAD';
    private const TAIL = 'TAIL';

    private int $rounds = 1;

    public function __construct(private Player $p1,private Player $p2)
    {

    }

    public function play()
    {
        while (true) {
            $flip = $this->flip();
            if (self::HEAD === $flip) {
                $this->p2->givePenny($this->p1);
            } else {
                $this->p1->givePenny($this->p2);
            }

            $this->rounds++;

            if ($this->p1->bankrupt() || $this->p2->bankrupt()) {
                return $this->finish();
            }
        }
    }

    private function flip()
    {
        return rand(0, 1) ? self::HEAD : self::TAIL;
    }

    private function finish()
    {
        return <<<EOT
            The game is finish
            
            The player 1 bankroll {$this->p1->bankroll()}
            
            The player 2 bankroll {$this->p2->bankroll()}
            
            Number of rounds {$this->rounds}
        EOT;
    }
}