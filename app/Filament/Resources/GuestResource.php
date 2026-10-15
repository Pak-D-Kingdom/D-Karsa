<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Tamu & RSVP';
    protected static ?string $navigationLabel = 'Daftar Tamu';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('couple_id')->relationship('couple', 'slug')->label('Mempelai')->searchable()->preload(),
            Forms\Components\TextInput::make('name')->label('Nama Tamu')->required()->maxLength(255),
            Forms\Components\TextInput::make('slug')->label('Slug Link')->helperText('Otomatis dari nama, untuk ?to=slug')->unique(ignoreRecord: true)->maxLength(255),
            Forms\Components\TextInput::make('phone')->label('WhatsApp')->tel()->placeholder('0812...'),
            Forms\Components\Select::make('category')->options(['Keluarga' => 'Keluarga','Teman' => 'Teman','Rekan Kerja' => 'Rekan Kerja','Umum' => 'Umum'])->default('Umum')->required(),
            Forms\Components\TextInput::make('address')->label('Alamat')->maxLength(255),
            Forms\Components\TextInput::make('quota')->label('Kuota Orang')->numeric()->default(1)->minValue(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->weight('bold'),
            Tables\Columns\TextColumn::make('slug')->copyable()->copyMessage('Link disalin!')->badge()->color('gray')->searchable()->label('Link ?to='),
            Tables\Columns\TextColumn::make('category')->badge()->color(fn (string $state) => match ($state) { 'Keluarga' => 'success', 'Teman' => 'info', 'Rekan Kerja' => 'warning', default => 'gray' }),
            Tables\Columns\TextColumn::make('quota')->label('Kuota')->alignCenter(),
            Tables\Columns\TextColumn::make('phone')->toggleable(isToggledHiddenByDefault: true),
        ])->filters([
            Tables\Filters\SelectFilter::make('category')->options(['Keluarga'=>'Keluarga','Teman'=>'Teman','Rekan Kerja'=>'Rekan Kerja','Umum'=>'Umum']),
        ])->actions([
            Tables\Actions\Action::make('copyLink')->label('Copy Link')->icon('heroicon-o-link')->color('info')
                ->action(fn (Guest $record) => null)
                ->extraAttributes(function (Guest $record) {
                    $coupleSlug = $record->couple?->slug ?? 'rizky-amanda';
                    $url = url("/undangan/{$coupleSlug}?to={$record->slug}");
                    return ['onclick' => "navigator.clipboard.writeText('{$url}'); window.\$wireui?.notify?.({title:'Link disalin!'})"];
                })
                ->url(function (Guest $record) {
                    $coupleSlug = $record->couple?->slug ?? 'rizky-amanda';
                    return url("/undangan/{$coupleSlug}?to={$record->slug}");
                }, shouldOpenInNewTab: true),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListGuests::route('/'), 'create' => Pages\CreateGuest::route('/create'), 'edit' => Pages\EditGuest::route('/{record}/edit')];
    }
}
