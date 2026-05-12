<?php
namespace App\Filament\Resources\BusinessCenterResource\Pages;
use App\Filament\Resources\BusinessCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListBusinessCenters extends ListRecords
{
    protected static string $resource = BusinessCenterResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
