<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\article;
use Illuminate\Foundation\Auth\User;
use App\Filament\Resources\ArticleResource;
use App\Models\domaine;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Article', article::query()->count())
            ->description('touts les article disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('user', User::query()->count())
            ->description('touts les utilisateur disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
            Stat::make('domaine', domaine::query()->count())
            ->description('touts les domaine disponible')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
        ];
    }
}
