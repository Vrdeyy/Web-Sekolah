<?php
namespace App\Filament\Resources\PrincipalMessageResource\Pages;
use App\Filament\Resources\PrincipalMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditPrincipalMessage extends EditRecord
{
    protected static string $resource = PrincipalMessageResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
