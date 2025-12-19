<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementResource\Pages;
use App\Models\Achievement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;
    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?string $navigationLabel = 'Prestasi';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Prestasi')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('student_name')
                            ->label('Nama Siswa'),
                        Forms\Components\TextInput::make('competition_name')
                            ->label('Nama Kompetisi'),
                        Forms\Components\Select::make('level')
                            ->label('Tingkat')
                            ->options([
                                'Sekolah' => 'Sekolah',
                                'Kota/Kabupaten' => 'Kota/Kabupaten',
                                'Provinsi' => 'Provinsi',
                                'Nasional' => 'Nasional',
                                'Internasional' => 'Internasional',
                            ]),
                        Forms\Components\TextInput::make('rank')
                            ->label('Peringkat'),
                        Forms\Components\TextInput::make('year')
                            ->label('Tahun'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto')
                            ->image()
                            ->directory('achievements'),
                    ])->columns(2),
                Forms\Components\Section::make('Deskripsi')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4),
                    ]),
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('student_name')
                    ->label('Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Tingkat')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Internasional' => 'success',
                        'Nasional' => 'primary',
                        'Provinsi' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('rank')
                    ->label('Peringkat'),
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                    ->label('Tingkat')
                    ->options([
                        'Sekolah' => 'Sekolah',
                        'Kota/Kabupaten' => 'Kota/Kabupaten',
                        'Provinsi' => 'Provinsi',
                        'Nasional' => 'Nasional',
                        'Internasional' => 'Internasional',
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
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}
