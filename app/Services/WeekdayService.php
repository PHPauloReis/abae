<?php

namespace App\Services;

class WeekdayService
{
    private $days = [
        '' => '---',
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sábado'
    ];

    public function getDays()
    {
        return $this->days;
    }
}
