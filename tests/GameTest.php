<?php

use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class GameTest extends TestCase
{
    public function testInstanceGame()
    {
        $p1 = new Player('Joe', 10);
        $p2 = new Player('Casino', 10);
        $game = new Game($p1, $p2);
        $this->assertInstanceOf(Game::class, $game);
    }

    public function testGameShouldEnd()
    {
        $p1 = new Player('Joe', 10);
        $p2 = new Player('Casino', 10);
        $game = new Game($p1, $p2);
        $this->assertIsString($game->play());
    }

    public function testBankRollShouldBeDiffrentAfterGame()
    {
        $p1 = new Player('Joe', 10);
        $p2 = new Player('Casino', 10);
        $game = new Game($p1, $p2);
        $game->play();
        $this->assertTrue($p1->bankroll() !== 10);
        $this->assertTrue($p2->bankroll() !== 10);
    }

    public function testOnePlayerShouldBeBankrupt()
    {
        $p1 = new Player('Joe', 100);
        $p2 = new Player('Casino', 100);
        $game = new Game($p1, $p2);
        $score = $game->play();
        $this->assertTrue($p1->bankrupt() || $p2->bankrupt());
        $this->assertStringContainsString('Number of rounds', $score);

        echo $score;
    }
}