<?php
namespace App\Filament\Resources\BusinessCenterResource\Pages;
use App\Filament\Resources\BusinessCenterResource;
use Filament\Resources\Pages\CreateRecord;
class CreateBusinessCenter extends CreateRecord
{
    protected static string $resource = BusinessCenterResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
