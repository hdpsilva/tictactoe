<?php

namespace App\Domain\Game\Entity;


class GameBoard
{
    public const BOARD_DIMENSION_DEFAULT = 3;
    public const BOARD_EMPTY_CELL = ' ';

    /**
     * @var array
     */
    public $board;

    /**
     * @var int
     */
    public $boardDimension;

    /**
     * GameBoard constructor.
     * @param int $boardDimension
     */
    public function __construct(int $boardDimension)
    {
        $this->boardDimension = $boardDimension;
        $this->createEmptyBoard($boardDimension);
    }

    private function createEmptyBoard(int $dimension = GameBoard::BOARD_DIMENSION_DEFAULT): void
    {
        $this->board = null;
        for ($n = 0; $n < $dimension; $n++) {
            for ($m = 0; $m < $dimension; $m++) {
                $this->board[$n][$m] = GameBoard::BOARD_EMPTY_CELL;
            }
        }
    }

    /**
     * @param int $coordinateX
     * @param int $coordinateY
     * @param string $token
     */
    public function markCellWithToken(int $coordinateX, int $coordinateY, string $token): void
    {
        if ($this->board[$coordinateX][$coordinateY] === self::BOARD_EMPTY_CELL) {
            $this->board[$coordinateX][$coordinateY] = $token;
        }
    }

    /**
     * @param int $coordinateX
     * @param int $coordinateY
     * @return string
     */
    public function getPlayerTokenAt(int $coordinateX, int $coordinateY): string
    {
        return $this->board[$coordinateX][$coordinateY];
    }
}