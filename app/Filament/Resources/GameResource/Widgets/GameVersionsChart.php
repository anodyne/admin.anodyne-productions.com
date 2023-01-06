<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\DoughnutChartWidget;

class GameVersionsChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Installed versions';

    protected static ?string $pollingInterval = null;

    protected function getData(): array
    {
        $data = Game::orderBy('version', 'asc')
            ->selectRaw('version, count(*) as total')
            ->groupBy('version')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Versions',
                    'data' => $data->map(fn (Game $game) => $game->total),
                    'backgroundColor' => [
                        '#0ea5e9',
                        '#a855f7',
                        '#10b981',
                        '#facc15',
                        '#f97316',
                        '#f472b6',
                        '#f43f5e',
                        '#64748b',
                    ],
                    'borderWidth' => 0,
                    'cutout' => '65%',
                    'spacing' => 15,
                ],
            ],
            'labels' => $data->map(fn (Game $game) => $game->version),
        ];
    }
}
