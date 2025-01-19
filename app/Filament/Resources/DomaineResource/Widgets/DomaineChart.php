<?php

namespace App\Filament\Resources\DomaineResource\Widgets;

use App\Models\domaine;
use Filament\Widgets\ChartWidget;

class DomaineChart extends ChartWidget
{
    protected static ?string $heading = 'domaine Creation Over Time';

    protected function getData(): array
    {

        $domaine = domaine::selectRaw('count(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Domaine Created',
                    'data' => $domaine->map(fn ($domaine) => $domaine->count),
                    'borderColor' => '#4e73df',
                    'fill' => false,
                    'tension' => 0.1,
                ],
            ],
            'labels' => $domaine->map(fn ($article) => 'Month ' . $article->month),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
