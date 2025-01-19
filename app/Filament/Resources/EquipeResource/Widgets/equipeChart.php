<?php

namespace App\Filament\Resources\EquipeResource\Widgets;


use App\Models\equipe;
use Filament\Widgets\ChartWidget;

class equipeChart extends ChartWidget
{
    protected static ?string $heading = 'equipe Creation Over Time';

    protected function getData(): array
    {

        $equipe = equipe::selectRaw('count(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Domaine Created',
                    'data' => $equipe->map(fn ($equipe) => $equipe->count),
                    'borderColor' => '#4e73df',
                    'fill' => false,
                    'tension' => 0.1,
                ],
            ],
            'labels' => $equipe->map(fn ($equipe) => 'Month ' . $equipe->month),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
