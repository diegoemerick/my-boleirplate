<?php

namespace App\Domain\Model;

class Cpf
{
    private $number;
    private $block;

    public function validateNumber($number)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $number);
        if (strlen($cpf) != 11)
            return false;
        for ($i = 0, $j = 10, $sum = 0; $i < 9; $i++, $j--)
            $sum += $cpf{$i} * $j;
        $rest = $sum % 11;
        if ($cpf{9} != ($rest < 2 ? 0 : 11 - $rest))
            return false;
        for ($i = 0, $j = 11, $sum = 0; $i < 10; $i++, $j--)
            $sum += $cpf{$i} * $j;
        $rest = $sum % 11;
        return $cpf{10} == ($rest < 2 ? 0 : 11 - $rest);
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }


}