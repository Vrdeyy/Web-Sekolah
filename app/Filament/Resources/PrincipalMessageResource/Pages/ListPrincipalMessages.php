<?php
namespace App\Filament\Resources\PrincipalMessageResource\Pages;
use App\Filament\Resources\PrincipalMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListPrincipalMessages extends ListRecords
{
    protected static string $resource = PrincipalMessageResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
