<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Vpn: string implements HasLabel

{
    case OK = 'ok';
    case NOK = 'nok';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}