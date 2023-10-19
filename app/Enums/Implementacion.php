<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Implementacion: string implements HasLabel

{
    case DIRECTO = 'directo';
    case DNI_PIN = 'dni-pin';
    case YAPE = 'saldo';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
