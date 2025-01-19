<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User; // Importez le modèle User si vous en avez besoin

class UserChart extends ChartWidget
{
    protected static ?string $heading = 'User Distribution';

    protected function getData(): array
    {
      
        $users = User::selectRaw('count(*) as count, typeUser')
            ->groupBy('typeUser')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'User Type Distribution',
                    'data' => $users->map(fn ($user) => $user->count),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'], // Couleurs personnalisées
                ],
            ],
            'labels' => $users->map(fn ($user) => $user->typeUser),
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // Type de graphique
    }
}
