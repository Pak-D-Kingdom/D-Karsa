<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Undangan';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('couple_id')->relationship('couple', 'slug')->label('Mempelai')->searchable()->preload(),
            Forms\Components\FileUpload::make('image')
                ->label('Foto')
                ->image()
                ->disk('public')
                ->visibility('public')
                ->directory('couples/galleries')
                ->required()
                ->maxSize(5120)
                ->validationMessages([
                    'max' => 'Ukuran file foto galeri tidak boleh lebih dari 5 MB.',
                ])
                ->helperText('Format JPG, PNG, atau WEBP (Maksimal 5 MB)')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('caption')->label('Caption')->maxLength(255)->columnSpanFull(),
            Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')->label('Foto')->disk('public')->size(50)->defaultImageUrl(asset('images/placeholder-gallery.svg'))->checkFileExistence(false),
            Tables\Columns\TextColumn::make('caption')->limit(30)->searchable(),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y')->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])->defaultSort('sort_order')->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
          ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListGalleries::route('/'), 'create' => Pages\CreateGallery::route('/create'), 'edit' => Pages\EditGallery::route('/{record}/edit')];
    }
}
