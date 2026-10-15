<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WishResource\Pages;
use App\Models\Wish;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WishResource extends Resource
{
    protected static ?string $model = Wish::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Tamu & RSVP';
    protected static ?string $navigationLabel = 'Ucapan & Doa';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nama')->required(),
            Forms\Components\Textarea::make('message')->label('Ucapan')->required()->rows(4)->columnSpanFull(),
            Forms\Components\Toggle::make('is_approved')->label('Tampilkan di Undangan')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->weight('bold'),
            Tables\Columns\TextColumn::make('message')->limit(50)->wrap(),
            Tables\Columns\IconColumn::make('is_approved')->label('Tampil')->boolean(),
            Tables\Columns\TextColumn::make('created_at')->label('Waktu')->dateTime('d M Y H:i')->sortable(),
        ])->defaultSort('created_at','desc')->filters([
            Tables\Filters\TernaryFilter::make('is_approved')->label('Ditampilkan'),
        ])->actions([
            Tables\Actions\Action::make('toggle')->label(fn (Wish $r) => $r->is_approved ? 'Sembunyikan' : 'Tampilkan')
                ->icon(fn (Wish $r) => $r->is_approved ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                ->action(fn (Wish $r) => $r->update(['is_approved' => ! $r->is_approved]))->color('gray'),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListWishes::route('/'), 'create' => Pages\CreateWish::route('/create'), 'edit' => Pages\EditWish::route('/{record}/edit')];
    }
}
