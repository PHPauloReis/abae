<?php

namespace App\Services;

class ActivityLocationService
{
    private $locations = [
        '' => '---',
        1 => 'Sede',
        2 => '19BC'
    ];

    public function getLocations()
    {
        return $this->locations;
    }
}
