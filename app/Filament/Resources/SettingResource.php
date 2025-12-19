<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Pengaturan Website';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->label('Kunci')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('type')
                            ->label('Tipe')
                            ->options([
                                'text' => 'Teks',
                                'textarea' => 'Teks Panjang',
                                'image' => 'Gambar',
                                'url' => 'URL',
                            ])
                            ->required()
                            ->live(),
                        Forms\Components\Select::make('group')
                            ->label('Grup')
                            ->options([
                                'general' => 'Umum',
                                'contact' => 'Kontak',
                                'social' => 'Sosial Media',
                                'ppdb' => 'PPDB',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('value')
                            ->label('Nilai')
                            ->visible(fn(Forms\Get $get) => in_array($get('type'), ['text', 'url'])),
                        Forms\Components\Textarea::make('value')
                            ->label('Nilai')
                            ->rows(4)
                            ->visible(fn(Forms\Get $get) => $get('type') === 'textarea'),
                        Forms\Components\FileUpload::make('value')
                            ->label('Gambar')
                            ->image()
                            ->directory('settings')
                            ->visible(fn(Forms\Get $get) => $get('type') === 'image'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Kunci')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Nilai')
                    ->limit(50),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge(),
                Tables\Columns\TextColumn::make('group')
                    ->label('Grup')
                    ->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => 'Umum',
                        'contact' => 'Kontak',
                        'social' => 'Sosial Media',
                        'ppdb' => 'PPDB',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
