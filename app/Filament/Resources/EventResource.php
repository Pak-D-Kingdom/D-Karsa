<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Undangan';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('couple_id')->relationship('couple', 'slug')->label('Mempelai')->required()->searchable()->preload(),
            Forms\Components\TextInput::make('title')->label('Nama Acara')->placeholder('Akad Nikah / Resepsi')->required(),
            Forms\Components\DatePicker::make('date')->label('Tanggal')->required(),
            Forms\Components\TimePicker::make('start_time')->label('Jam Mulai')->seconds(false),
            Forms\Components\TimePicker::make('end_time')->label('Jam Selesai')->seconds(false),
            Forms\Components\TextInput::make('venue_name')->label('Nama Tempat'),
            Forms\Components\Textarea::make('address')->label('Alamat')->rows(2)->columnSpanFull(),
            Forms\Components\TextInput::make('maps_url')->label('Link Google Maps')->url()->columnSpanFull(),
            Forms\Components\Textarea::make('maps_embed')->label('Embed Iframe (opsional)')->rows(3)->columnSpanFull()->helperText('Paste <iframe> dari Google Maps bila ada'),
            Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('couple.slug')->label('Mempelai')->badge(),
            Tables\Columns\TextColumn::make('title')->searchable()->weight('bold'),
            Tables\Columns\TextColumn::make('date')->date('d M Y')->sortable(),
            Tables\Columns\TextColumn::make('start_time')->label('Jam'),
            Tables\Columns\TextColumn::make('venue_name')->limit(20),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
        ])->defaultSort('sort_order')->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListEvents::route('/'), 'create' => Pages\CreateEvent::route('/create'), 'edit' => Pages\EditEvent::route('/{record}/edit')];
    }
}
