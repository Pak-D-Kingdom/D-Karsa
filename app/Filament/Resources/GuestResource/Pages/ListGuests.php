<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuests extends ListRecords
{
    protected static string $resource = GuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('batchCreate')
                ->label('Tambah Tamu Massal (Batch)')
                ->icon('heroicon-o-document-plus')
                ->color('success')
                ->modalHeading('Tambah Banyak Tamu Sekaligus (Batch)')
                ->modalDescription('Tempelkan (paste) puluhan hingga ratusan nama tamu dari Excel atau chat WA. Sistem otomatis membuatkan data tamu dan tautan unik untuk masing-masing baris.')
                ->form([
                    \Filament\Forms\Components\Select::make('couple_id')
                        ->relationship('couple', 'slug')
                        ->getOptionLabelFromRecordUsing(fn (\App\Models\Couple $record) => ($record->customer_name ?: ($record->groom_name . ' & ' . $record->bride_name)) . ' (' . $record->slug . ')')
                        ->label('Undangan / Mempelai')
                        ->searchable()
                        ->preload()
                        ->required(),
                    \Filament\Forms\Components\Textarea::make('names_list')
                        ->label('Daftar Nama Tamu (1 Nama Per Baris)')
                        ->placeholder("Contoh:\nUstadz Dr. H. Syamsuddin\ndr. Sarah Amanda\nRian Hidayat\nBapak Hendra Wijaya\n...")
                        ->rows(10)
                        ->required()
                        ->helperText('Bisa copy-paste langsung dari kolom Excel atau daftar nomor di WA. Penomoran (1., 2., dll) otomatis dibersihkan.'),
                    \Filament\Forms\Components\Select::make('category')
                        ->options([
                            'Umum' => 'Umum',
                            'Teman' => 'Teman',
                            'Rekan Kerja' => 'Rekan Kerja',
                            'VIP' => 'VIP',
                            'Keluarga' => 'Keluarga',
                        ])
                        ->default('Umum')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('quota')
                        ->label('Kuota Orang Per Tamu')
                        ->numeric()
                        ->default(1)
                        ->minValue(1)
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $lines = preg_split('/\r\n|\r|\n/', $data['names_list']);
                    $count = 0;
                    foreach ($lines as $line) {
                        $name = trim($line);
                        // Bersihkan penomoran awal misal "1. ", "2) ", "- "
                        $name = preg_replace('/^\d+[\.\)\-\s]+/', '', $name);
                        $name = trim($name);
                        if (empty($name)) continue;

                        \App\Models\Guest::create([
                            'couple_id' => $data['couple_id'],
                            'name' => $name,
                            'category' => $data['category'],
                            'quota' => $data['quota'] ?? 1,
                        ]);
                        $count++;
                    }

                    \Filament\Notifications\Notification::make()
                        ->title("Berhasil!")
                        ->body("{$count} tamu perorangan berhasil ditambahkan ke database.")
                        ->success()
                        ->send();
                }),
            Actions\CreateAction::make()->label('Tambah Tamu Satuan'),
        ];
    }
}
