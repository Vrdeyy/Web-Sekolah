<?php
namespace App\Filament\Resources\BusinessCenterResource\Pages;
use App\Filament\Resources\BusinessCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditBusinessCenter extends EditRecord
{
    protected static string $resource = BusinessCenterResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
