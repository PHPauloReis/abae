<?php

namespace App\Services;

class MonthService
{
    private $months = [
        '' => '---',
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];

    public function getMonths()
    {
        return $this->months;
    }

    public function getShortMonths()
    {
        $months = [];

        foreach($this->months as $key => $month) {
            $months[$key] = substr($month, 0, 3);
        }

        return $months;
    }

    public function getMonth($index)
    {
        return $this->months[$index];
    }

    public function getShortMonth($index)
    {
        return substr($this->months[$index], 0, 3);
    }
}
