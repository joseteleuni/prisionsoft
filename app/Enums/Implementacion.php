<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Implementacion: string implements HasLabel

{
    case Directo = 'directo';
    case DNI_PIN = 'dni-pin';
    case SALDO = 'saldo';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
