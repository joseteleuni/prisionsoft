<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum Status: string implements HasLabel

{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}

enum Estado: string implements HasLabel

{
    case OK = 'ok';
    case NOK = 'nok';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}