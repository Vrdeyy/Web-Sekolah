<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?string $navigationLabel = 'Agenda Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Agenda')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Kegiatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Repeater::make('selected_dates')
                            ->label('Daftar Tanggal Kegiatan')
                            ->simple(
                                Forms\Components\DatePicker::make('date')
                                    ->native(false)
                                    ->displayFormat('d F Y')
                                    ->required()
                            )
                            ->grid(3)
                            ->default([now()->toDateString()])
                            ->addActionLabel('Tambah Tanggal')
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Klik "Tambah Tanggal" untuk memilih lebih dari satu hari.'),
                        
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'akademik' => '🟣 Akademik',
                                'libur'    => '🔴 Libur / Ujian',
                                'event'    => '🟡 Event Sekolah',
                            ])
                            ->default('akademik')
                            ->required()
                            ->helperText('Pilih kategori sesuai jenis kegiatan. Warna penanda akan otomatis disesuaikan.'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\Textarea::make('description')
                            ->label('Keterangan Singkat')
                            ->columnSpanFull()
                            ->rows(3),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->formatStateUsing(function ($record) {
                        $count = count($record->selected_dates ?? []);
                        if ($count > 1) {
                            return $record->event_date->format('d M Y') . " (+ " . ($count - 1) . " hari)";
                        }
                        return $record->event_date->format('d M Y');
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Kegiatan')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('category')
                    ->label('Kategori')
                    ->formatStateUsing(fn ($state) => Agenda::CATEGORIES[$state]['label'] ?? ucfirst($state))
                    ->colors([
                        'success' => 'akademik',
                        'danger'  => 'libur',
                        'warning' => 'event',
                    ]),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
            ])
            ->defaultSort('event_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'libur'    => 'Libur / Ujian',
                        'event'    => 'Event Sekolah',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Hanya Aktif'),
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
            'index'  => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit'   => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
