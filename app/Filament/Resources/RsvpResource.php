<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RsvpResource\Pages;
use App\Models\Rsvp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RsvpResource extends Resource
{
    protected static ?string $model = Rsvp::class;
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = 'Tamu & RSVP';
    protected static ?string $navigationLabel = 'Konfirmasi RSVP';
    protected static ?string $modelLabel = 'Konfirmasi RSVP';
    protected static ?string $pluralModelLabel = 'Konfirmasi Kehadiran (RSVP)';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('guest_id')
                ->relationship('guest', 'name')
                ->label('Tamu Terdaftar')
                ->searchable()
                ->preload()
                ->placeholder('Pilih dari daftar tamu (opsional)'),
            Forms\Components\Select::make('category')
                ->label('Kategori Acara')
                ->options([
                    'Pernikahan' => 'Pernikahan',
                    'Halal Bihalal' => 'Halal Bihalal',
                    'Khitanan' => 'Khitanan',
                    'Aqiqah' => 'Aqiqah',
                    'Ulang Tahun' => 'Ulang Tahun',
                    'Wisuda' => 'Wisuda',
                    'Acara Formal' => 'Acara Formal',
                    'Syukuran' => 'Syukuran / Acara Lain',
                ])
                ->default('Pernikahan')
                ->required(),
            Forms\Components\TextInput::make('name')
                ->label('Nama Tamu Undangan')
                ->required(),
            Forms\Components\Select::make('attendance')
                ->label('Status Kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'tidak_hadir' => 'Tidak Hadir',
                    'ragu' => 'Masih Ragu',
                ])
                ->required()
                ->default('hadir'),
            Forms\Components\TextInput::make('guest_count')
                ->label('Jumlah Orang (Pax)')
                ->numeric()
                ->default(1)
                ->minValue(1),
            Forms\Components\Textarea::make('message')
                ->label('Pesan / Doa Kehadiran')
                ->rows(4)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama Tamu')
                ->searchable()
                ->weight('bold'),
            Tables\Columns\TextColumn::make('category')
                ->label('Kategori Acara')
                ->badge()
                ->color(fn (?string $state) => match($state){
                    'Pernikahan' => 'danger',
                    'Halal Bihalal' => 'success',
                    'Khitanan' => 'info',
                    'Aqiqah' => 'primary',
                    'Ulang Tahun' => 'warning',
                    'Wisuda' => 'info',
                    'Acara Formal' => 'gray',
                    default => 'gray',
                })
                ->sortable(),
            Tables\Columns\TextColumn::make('attendance')
                ->label('Status Kehadiran')
                ->badge()
                ->color(fn (string $state) => match($state){
                    'hadir' => 'success',
                    'tidak_hadir' => 'danger',
                    default => 'warning'
                })
                ->formatStateUsing(fn (string $state) => match($state){
                    'hadir' => 'Hadir',
                    'tidak_hadir' => 'Tidak Hadir',
                    'ragu' => 'Masih Ragu',
                    default => ucfirst($state)
                }),
            Tables\Columns\TextColumn::make('guest_count')
                ->label('Jumlah (Pax)')
                ->alignCenter()
                ->badge()
                ->color('gray')
                ->formatStateUsing(fn ($state) => ($state ?? 1) . ' Orang'),
            Tables\Columns\TextColumn::make('message')
                ->label('Pesan / Doa Tamu')
                ->wrap()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Waktu Konfirmasi')
                ->dateTime('d M Y H:i')
                ->sortable(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            Tables\Filters\SelectFilter::make('category')
                ->label('Kategori Acara')
                ->options([
                    'Pernikahan' => 'Pernikahan',
                    'Halal Bihalal' => 'Halal Bihalal',
                    'Khitanan' => 'Khitanan',
                    'Aqiqah' => 'Aqiqah',
                    'Ulang Tahun' => 'Ulang Tahun',
                    'Wisuda' => 'Wisuda',
                    'Acara Formal' => 'Acara Formal',
                    'Syukuran' => 'Syukuran / Acara Lain',
                ]),
            Tables\Filters\SelectFilter::make('attendance')
                ->label('Status Kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'tidak_hadir' => 'Tidak Hadir',
                    'ragu' => 'Masih Ragu',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
            ])
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListRsvps::route('/'), 'create' => Pages\CreateRsvp::route('/create'), 'edit' => Pages\EditRsvp::route('/{record}/edit')];
    }
}
