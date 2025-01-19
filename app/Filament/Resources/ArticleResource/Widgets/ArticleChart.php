<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Article; // Assurez-vous d'importer votre modèle

class ArticleChart extends ChartWidget
{
    protected static ?string $heading = 'Article Statistics';

    protected function getData(): array
    {

        $articles = Article::selectRaw('count(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        return [
            'datasets' => [
                [
                    'label' => 'Number of Articles per Month',
                    'data' => $articles->map(fn ($article) => $article->count),
                    'backgroundColor' => '#4e73df', // Couleur des barres
                ],
            ],
            'labels' => $articles->map(fn ($article) => 'Month ' . $article->month),
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // Type de graphique : barre
    }
}
