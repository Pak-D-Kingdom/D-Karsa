<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoupleResource\Pages;
use App\Models\Couple;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CoupleResource extends Resource
{
    protected static ?string $model = Couple::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';
    protected static ?string $navigationGroup = 'Undangan';
    protected static ?string $navigationLabel = 'Data Undangan';
    protected static ?string $modelLabel = 'Undangan';
    protected static ?string $pluralModelLabel = 'Data Undangan';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $pendingCount = static::getModel()::where('status', 'pending')->count();
        return $pendingCount > 0 ? (string) $pendingCount : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Status Undangan & Pembayaran Midtrans')->schema([
                Forms\Components\Select::make('status')->label('Status Undangan')
                    ->options([
                        'pending' => '⏳ Menunggu ACC / Aktivasi',
                        'published' => '✅ Aktif / Terverifikasi',
                    ])->default('published')->required(),
                Forms\Components\Select::make('payment_status')->label('Status Pembayaran')
                    ->options([
                        'pending' => '⏳ Belum Bayar (Pending)',
                        'paid' => '✅ Lunas (Paid via Midtrans)',
                        'failed' => '❌ Gagal',
                        'expired' => '⚠️ Kedaluwarsa',
                    ])->default('pending')->required(),
                Forms\Components\TextInput::make('amount')->label('Nominal Pembayaran')->numeric()->prefix('Rp'),
                Forms\Components\TextInput::make('customer_name')->label('Nama Pemesan')->placeholder('Rizky Kurniawan'),
                Forms\Components\TextInput::make('customer_phone')->label('Nomor WhatsApp Pemesan')->tel()->placeholder('081234567890'),
                Forms\Components\TextInput::make('invoice_number')->label('No. Invoice Midtrans')->placeholder('INV-DK-...'),
                Forms\Components\TextInput::make('payment_method')->label('Metode Bayar')->placeholder('QRIS / BCA VA'),
                Forms\Components\Textarea::make('story')
                    ->label('Paket & Catatan Request Desain')
                    ->rows(2)
                    ->columnSpanFull()
                    ->helperText('Paket yang dipilih dan catatan request kustom dari pemesan'),
            ])->columns(3),

            Forms\Components\Section::make('Info Umum')->schema([
                Forms\Components\Select::make('category')->label('Kategori Undangan')
                    ->options([
                        'Pernikahan' => '1. Undangan Pernikahan',
                        'Ulang Tahun' => '2. Undangan Ulang Tahun',
                        'Aqiqah' => '3. Undangan Aqiqah & Kelahiran',
                        'Keagamaan' => '4. Undangan Keagamaan',
                        'Wisuda' => '5. Undangan Wisuda & Kelulusan',
                        'Acara Formal' => '6. Undangan Acara Formal',
                    ])->default('Pernikahan')->required(),
                Forms\Components\TextInput::make('theme')
                    ->label('Template / Tema Desain')
                    ->datalist([
                        'Simple Minimalist Floral',
                        'Chibi Red',
                        'Wildflower Pink',
                        '3D Javanese Royal',
                        'Batak Istimewa Heritage',
                        'SnowFall Minimalist',
                        'Faris & Zahra',
                        'Golden Luxury Birthday',
                        'Kids Birthday Party',
                        'Baby Aqiqah',
                        'Walimatul Khitan',
                        'Tahlilan & Doa Bersama',
                        'Halal Bihalal',
                        'Wisuda & Kelulusan',
                        'Syukuran Rumah Baru',
                        'Formal & Corporate',
                    ])
                    ->placeholder('Contoh: Simple Minimalist Floral')
                    ->helperText('Pilih atau ketik template desain undangan'),
                Forms\Components\TextInput::make('sub_category')->label('Sub-Kategori / Spesifikasi Acara')->placeholder('Contoh: Minimalis modern / Sweet seventeen'),
                Forms\Components\TextInput::make('event_heading')->label('Kata Pembuka / Heading')->placeholder("WALIMATUL 'URSY"),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true)->helperText('Untuk URL: /undangan/slug'),
                Forms\Components\DatePicker::make('wedding_date')->label('Tanggal Acara')->required(),
                Forms\Components\TextInput::make('venue_name')->label('Tempat Utama')->maxLength(255),
                Forms\Components\Toggle::make('is_in_catalog')->label('Tampilkan di Katalog Desain Beranda')->inline(false),
                Forms\Components\Textarea::make('quote')->label('Ayat / Quote')->rows(2)->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Pihak Pertama / Pria')->schema([
                Forms\Components\TextInput::make('groom_name')->label('Nama Panggilan')->required(),
                Forms\Components\TextInput::make('groom_fullname')->label('Nama Lengkap')->required(),
                Forms\Components\TextInput::make('groom_birth_order')->label('Urutan Anak')->placeholder('Putra Pertama'),
                Forms\Components\TextInput::make('groom_father')->label('Ayah'),
                Forms\Components\TextInput::make('groom_mother')->label('Ibu'),
                Forms\Components\TextInput::make('groom_city')->label('Kota / Asal'),
                Forms\Components\FileUpload::make('groom_photo')
                    ->label('Foto Pria')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('couples')
                    ->openable()
                    ->downloadable()
                    ->maxSize(5120)
                    ->validationMessages([
                        'max' => 'Ukuran file foto mempelai pria tidak boleh lebih dari 5 MB.',
                    ]),
            ])->columns(2),

            Forms\Components\Section::make('Pihak Kedua / Wanita')->schema([
                Forms\Components\TextInput::make('bride_name')->label('Nama Panggilan')->required(),
                Forms\Components\TextInput::make('bride_fullname')->label('Nama Lengkap')->required(),
                Forms\Components\TextInput::make('bride_birth_order')->label('Urutan Anak')->placeholder('Putri Kedua'),
                Forms\Components\TextInput::make('bride_father')->label('Ayah'),
                Forms\Components\TextInput::make('bride_mother')->label('Ibu'),
                Forms\Components\TextInput::make('bride_city')->label('Kota / Asal'),
                Forms\Components\FileUpload::make('bride_photo')
                    ->label('Foto Wanita')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('couples')
                    ->openable()
                    ->downloadable()
                    ->maxSize(5120)
                    ->validationMessages([
                        'max' => 'Ukuran file foto mempelai wanita tidak boleh lebih dari 5 MB.',
                    ]),
            ])->columns(2),

            Forms\Components\Section::make('Cover & Rekening')->schema([
                Forms\Components\FileUpload::make('cover_photo')
                    ->label('Foto Cover Undangan')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('couples/covers')
                    ->openable()
                    ->downloadable()
                    ->maxSize(5120)
                    ->validationMessages([
                        'max' => 'Ukuran file foto cover tidak boleh lebih dari 5 MB.',
                    ])
                    ->helperText('Tampil di halaman depan undangan (Maksimal 5 MB)')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('bank_name_1')->label('Bank 1')->placeholder('BCA'),
                Forms\Components\TextInput::make('bank_account_1')->label('No. Rekening 1')->placeholder('1234567890'),
                Forms\Components\TextInput::make('bank_holder_1')->label('Atas Nama 1'),
                Forms\Components\TextInput::make('bank_name_2')->label('Bank 2')->placeholder('Mandiri'),
                Forms\Components\TextInput::make('bank_account_2')->label('No. Rekening 2'),
                Forms\Components\TextInput::make('bank_holder_2')->label('Atas Nama 2'),
                Forms\Components\Textarea::make('gift_address')->label('Alamat Kado Fisik')->rows(2)->columnSpanFull(),
                Forms\Components\Textarea::make('thank_you_note')->label('Pesan Terima Kasih')->rows(2)->columnSpanFull(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('status')->label('Status')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'published' => 'success',
                    'pending' => 'warning',
                    default => 'gray',
                })
                ->formatStateUsing(fn (string $state) => match ($state) {
                    'published' => 'Aktif',
                    'pending' => 'Menunggu ACC',
                    default => $state,
                })
                ->sortable(),
            Tables\Columns\TextColumn::make('payment_status')->label('Pembayaran')
                ->badge()
                ->color(fn (?string $state) => match ($state) {
                    'paid' => 'success',
                    'pending' => 'warning',
                    'failed', 'expired' => 'danger',
                    default => 'gray',
                })
                ->formatStateUsing(fn (?string $state) => match ($state) {
                    'paid' => 'Lunas (Midtrans)',
                    'pending' => 'Belum Bayar',
                    'failed' => 'Gagal',
                    'expired' => 'Kedaluwarsa',
                    default => $state ?? 'Belum Bayar',
                })
                ->sortable(),
            Tables\Columns\TextColumn::make('amount')->label('Nominal')
                ->money('IDR', true)
                ->sortable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('customer_name')->label('Pemesan')->searchable()->placeholder('-'),
            Tables\Columns\TextColumn::make('customer_phone')->label('No. WA')->searchable()->placeholder('-'),
            Tables\Columns\TextColumn::make('story')->label('Paket / Catatan')->limit(25)->tooltip(fn ($record) => $record->story)->placeholder('-'),
            Tables\Columns\TextColumn::make('slug')->searchable()->badge(),
            Tables\Columns\TextColumn::make('category')->label('Kategori')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'Pernikahan' => 'danger',
                    'Ulang Tahun' => 'info',
                    'Aqiqah' => 'success',
                    'Keagamaan' => 'warning',
                    'Wisuda' => 'primary',
                    default => 'gray'
                }),
            Tables\Columns\TextColumn::make('sub_category')->label('Sub Kategori')
                ->limit(20)
                ->tooltip(fn ($record) => $record->sub_category)
                ->placeholder('-'),
            Tables\Columns\TextColumn::make('theme')->label('Template')
                ->limit(20)
                ->tooltip(fn ($record) => $record->theme)
                ->placeholder('Default')
                ->searchable(),
            Tables\Columns\ImageColumn::make('cover_photo')
                ->label('Cover')
                ->disk('public')
                ->square()
                ->size(44)
                ->defaultImageUrl(asset('images/placeholder-cover.svg'))
                ->checkFileExistence(false),
            Tables\Columns\ImageColumn::make('groom_photo')
                ->label('Foto Pria')
                ->disk('public')
                ->circular()
                ->size(40)
                ->defaultImageUrl(asset('images/placeholder-groom.svg'))
                ->checkFileExistence(false),
            Tables\Columns\ImageColumn::make('bride_photo')
                ->label('Foto Wanita')
                ->disk('public')
                ->circular()
                ->size(40)
                ->defaultImageUrl(asset('images/placeholder-bride.svg'))
                ->checkFileExistence(false),
            Tables\Columns\TextColumn::make('groom_name')->label('Pria / Tokoh 1')->searchable(),
            Tables\Columns\TextColumn::make('bride_name')->label('Wanita / Tokoh 2')->searchable(),
            Tables\Columns\TextColumn::make('wedding_date')->label('Tanggal')->date('d M Y')->sortable(),
            Tables\Columns\IconColumn::make('is_in_catalog')->label('Katalog?')->boolean(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Filter Status')
                ->options([
                    'pending' => 'Menunggu ACC',
                    'published' => 'Aktif',
                ]),
            Tables\Filters\SelectFilter::make('payment_status')
                ->label('Status Pembayaran')
                ->options([
                    'paid' => 'Lunas (Midtrans)',
                    'pending' => 'Belum Bayar',
                ]),
            Tables\Filters\SelectFilter::make('category')
                ->label('Filter Kategori')
                ->options([
                    'Pernikahan' => 'Pernikahan',
                    'Ulang Tahun' => 'Ulang Tahun',
                    'Aqiqah' => 'Aqiqah & Kelahiran',
                    'Keagamaan' => 'Keagamaan',
                    'Wisuda' => 'Wisuda & Kelulusan',
                    'Acara Formal' => 'Acara Formal',
                ]),
        ])
        ->actions([
            Tables\Actions\Action::make('approve')
                ->label('ACC Undangan')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('ACC & Aktifkan Undangan')
                ->modalDescription('Apakah Anda yakin ingin menyetujui (ACC) undangan ini? Setelah di-ACC, link undangan resmi akan langsung aktif dan bisa diakses publik.')
                ->modalSubmitActionLabel('Ya, ACC & Aktifkan')
                ->visible(fn (Couple $record) => $record->status !== 'published')
                ->action(function (Couple $record) {
                    $record->update(['status' => 'published']);
                    Notification::make()
                        ->title('Undangan Berhasil di-ACC!')
                        ->body("Undangan {$record->groom_name} kini telah resmi aktif.")
                        ->success()
                        ->send();
                }),

            Tables\Actions\Action::make('send_wa')
                ->label('Kirim Link ke WA')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('primary')
                ->tooltip('Kirim tautan undangan resmi ke WhatsApp pemesan')
                ->url(function (Couple $record) {
                    $rawPhone = $record->customer_phone ?? '';
                    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
                    if (str_starts_with($cleanPhone, '0')) {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                    $acaraTitle = ($record->category === 'Pernikahan') 
                        ? "{$record->groom_name} & {$record->bride_name}" 
                        : "{$record->groom_name} ({$record->category})";
                    $customerGreeting = !empty($record->customer_name) ? "Kak {$record->customer_name}" : "Bapak/Ibu";
                    $link = url('/undangan/' . $record->slug);
                    $waMessage = "Halo {$customerGreeting},\n\nKabar baik! Undangan digital Anda untuk *{$acaraTitle}* sudah selesai diverifikasi oleh tim D'Karsa dan resmi AKTIF! 🎉\n\nBerikut tautan undangan resmi Anda:\n👉 {$link}\n\nAnda dapat membagikan tautan di atas kepada keluarga, kerabat, dan tamu undangan.\nTerima kasih telah mempercayakan momen spesial Anda bersama D'Karsa Studio.";
                    return "https://api.whatsapp.com/send?phone={$cleanPhone}&text=" . urlencode($waMessage);
                })
                ->openUrlInNewTab()
                ->visible(fn (Couple $record) => !empty($record->customer_phone)),

            Tables\Actions\Action::make('preview')
                ->label('Buka Undangan')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->url(fn (Couple $record) => url('/undangan/' . $record->slug))
                ->openUrlInNewTab(),

            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCouples::route('/'),
            'create' => Pages\CreateCouple::route('/create'),
            'edit' => Pages\EditCouple::route('/{record}/edit'),
        ];
    }
}
