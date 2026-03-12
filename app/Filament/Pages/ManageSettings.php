<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Pengaturan Website';
    protected static ?string $title = 'Pengaturan Website';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('Umum')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('school_name')
                                            ->label('Nama Sekolah')
                                            ->required(),
                                        TextInput::make('years_experience')
                                            ->label('Tahun Pengalaman')
                                            ->numeric(),
                                        TextInput::make('ppdb_url')
                                            ->label('URL PPDB'),
                                        Toggle::make('ppdb_active')
                                            ->label('Status PPDB Aktif')
                                            ->onColor('success'),
                                    ]),
                            ]),
                        Tabs\Tab::make('Identitas & Kontak')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        FileUpload::make('school_logo')
                                            ->label('Logo Sekolah')
                                            ->directory('settings')
                                            ->image()
                                            ->columnSpanFull(),
                                        TextInput::make('school_tagline')
                                            ->label('Tagline Sekolah')
                                            ->placeholder('misal: Sekolah Unggulan Masa Depan')
                                            ->columnSpanFull(),
                                        Textarea::make('address')
                                            ->label('Alamat Lengkap')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        TextInput::make('school_email')
                                            ->label('Email Resmi')
                                            ->email(),
                                        TextInput::make('school_phone')
                                            ->label('Nomor Telepon'),
                                        TextInput::make('whatsapp')
                                            ->label('WhatsApp Official')
                                            ->placeholder('misal: 628123456789'),
                                        TextInput::make('school_hours')
                                            ->label('Jam Operasional')
                                            ->placeholder('misal: Senin - Jumat: 07:00 - 16:00'),
                                        Textarea::make('google_maps_embed')
                                            ->label('Google Maps Embed Code')
                                            ->placeholder('<iframe src="..."></iframe>')
                                            ->rows(5)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Hero Beranda')
                            ->icon('heroicon-o-home')
                            ->schema([
                                TextInput::make('hero_badge')
                                    ->label('Badge Hero (Atas Judul)'),
                                TextInput::make('hero_title')
                                    ->label('Judul Hero'),
                                Textarea::make('hero_description')
                                    ->label('Deskripsi Hero')
                                    ->rows(3),
                            ]),
                        Tabs\Tab::make('Statistik Hero')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Section::make('Statistik 1')
                                            ->schema([
                                                TextInput::make('hero_stats_1_label')
                                                    ->label('Label (misal: Siswa Aktif)'),
                                                TextInput::make('hero_stats_1_value')
                                                    ->label('Nilai (misal: 1500)'),
                                            ])->columnSpan(1),
                                        Section::make('Statistik 2')
                                            ->schema([
                                                TextInput::make('hero_stats_2_label')
                                                    ->label('Label (misal: Guru Profesional)'),
                                            ])->columnSpan(1),
                                        Section::make('Statistik 3')
                                            ->schema([
                                                TextInput::make('hero_stats_3_label')
                                                    ->label('Label (misal: Kelulusan)'),
                                                TextInput::make('hero_stats_3_value')
                                                    ->label('Nilai (misal: 98)'),
                                            ])->columnSpan(1),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => (string) ($value ?? ''),
                        'type' => 'text', // Default type
                        'group' => str_contains($key, 'hero') ? 'hero' : 'general', // Auto grouping
                    ]
                );
            }

            Notification::make()
                ->title('Pengaturan berhasil disimpan')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal menyimpan pengaturan')
                ->body($e->getMessage())
                ->danger()
                ->persistent()
                ->send();
        }
    }
}
