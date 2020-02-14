<?php

namespace App\Domain\Game\Entity;

class Game
{
    const PLAYER_TOKEN_A = 'X';
    const PLAYER_TOKEN_B = 'O';
    /**
     * @var Player
     */
    protected $playerA;

    /**
     * @var Player
     */
    protected $playerB;


    /**
     * @var string
     */
    protected $name;

    /**
     * @var GameBoard
     */
    protected $board;


    /**
     * Game constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Player
     */
    public function getPlayerA(): Player
    {
        return $this->playerA;
    }

    /**
     * @param Player $playerA
     * @return Game
     */
    public function addPlayerA(Player $playerA): Game
    {
        $this->playerA = $playerA;
        return $this;
    }

    /**
     * @return Player
     */
    public function getPlayerB(): Player
    {
        return $this->playerB;
    }

    /**
     * @param Player $playerB
     * @return Game
     */
    public function addPlayerB(Player $playerB): Game
    {
        $this->playerB = $playerB;
        return $this;
    }



    /**
     * @return GameBoard
     */
    public function getGameBoard(): GameBoard
    {
        return $this->board;
    }

    /**
     * @param GameBoard $board
     * @return Game
     */
    public function addBoard(GameBoard $board): Game
    {
        $this->board = $board;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Game
     */
    public function setName(string $name): Game
    {
        $this->name = $name;
        return $this;
    }

}