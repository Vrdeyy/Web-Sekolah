<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrincipalMessageResource\Pages;
use App\Models\PrincipalMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PrincipalMessageResource extends Resource
{
    protected static ?string $model = PrincipalMessage::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?string $navigationLabel = 'Sambutan Kepala Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kepala Sekolah')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Gelar/Jabatan'),
                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto')
                            ->image()
                            ->directory('principal')
                            ->avatar(),
                    ])->columns(2),
                Forms\Components\Section::make('Sambutan')
                    ->schema([
                        Forms\Components\RichEditor::make('message')
                            ->label('Sambutan')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Visi & Misi')
                    ->schema([
                        Forms\Components\RichEditor::make('vision')
                            ->label('Visi'),
                        Forms\Components\RichEditor::make('mission')
                            ->label('Misi'),
                    ])->columns(2),
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Gelar'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
            'index' => Pages\ListPrincipalMessages::route('/'),
            'create' => Pages\CreatePrincipalMessage::route('/create'),
            'edit' => Pages\EditPrincipalMessage::route('/{record}/edit'),
        ];
    }
}
