<?php

require_once __DIR__ ."/../vendor/autoload.php";

use App\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testInstancePlayer()
    {
        $player = new Player('Joe', 100);
        $this->assertInstanceOf(Player::class, $player);
    }

    public function testPlayerShouldHaveBankroll()
    {
        $player = new Player('Joe', 100);
        $this->assertIsInt($player->bankroll());
        $this->assertEquals(100, $player->bankroll());
    }

    public function testPlayerShouldBankruptWhenBankrollIsZero()
    {
        $player = new Player('Joe', 0);
        $this->assertEquals(0, $player->bankroll());
        $this->assertEquals(true, $player->bankrupt());
    }

    public function testPlayerShouldHaveName()
    {
        $player = new Player('Joe', 100);
        $this->assertEquals('Joe', $player->name);
    }

    public function testPlayerCanGivePenisToAnotherPlayer()
    {
        $p1 = new Player('Joe', 100);
        $p2 = new Player('Casino', 100);

        $p1->givePenny($p2);
        $this->assertEquals(99, $p1->bankroll());
        $this->assertEquals(101, $p2->bankroll());
    }
}