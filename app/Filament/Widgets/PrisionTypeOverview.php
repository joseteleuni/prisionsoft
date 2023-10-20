<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Prision;

class PrisionTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Penales', Prision::query()->count()),
            Stat::make('Starlink', Prision::query()->where('starlink','ok')->count()),
            Stat::make('Penales con Yape', Prision::query()->where('implementacion','saldo')->count())
        ];
    }
}
