<?php
namespace App\Filament\Resources\PrincipalMessageResource\Pages;
use App\Filament\Resources\PrincipalMessageResource;
use Filament\Resources\Pages\CreateRecord;
class CreatePrincipalMessage extends CreateRecord
{
    protected static string $resource = PrincipalMessageResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
