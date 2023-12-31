<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum Status: string implements HasLabel

{
    case OK = 'ok';
    case NOK = 'nok';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}