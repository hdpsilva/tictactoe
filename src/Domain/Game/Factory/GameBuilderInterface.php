<?php
namespace App\Domain\Game\Factory;


use App\Domain\Game\Entity\Game;
use App\Domain\Game\Entity\GameBoard;
use App\Domain\Game\Entity\Player;

interface GameBuilderInterface
{
    public function addPlayerA(Player $playerA);

    public function addPlayerB(Player $playerB);

    public function addBoard(GameBoard $gameBoard);

    public function setGameName(string $gameName);

    public function getGame() : Game;
}