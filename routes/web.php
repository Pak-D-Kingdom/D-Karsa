<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\MidtransPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
Route::get('/buat-undangan', [InvitationController::class, 'create'])->name('invitation.create');
Route::post('/buat-undangan', [InvitationController::class, 'store'])->name('invitation.store');
Route::get('/buat-undangan/sukses/{slug}', [InvitationController::class, 'success'])->name('invitation.success');
Route::get('/buat-undangan/pembayaran/{slug}', [MidtransPaymentController::class, 'checkout'])->name('midtrans.checkout');
Route::post('/buat-undangan/pembayaran/{slug}/simulasi', [MidtransPaymentController::class, 'simulatePayment'])->name('midtrans.simulate');
Route::post('/midtrans/notification', [MidtransPaymentController::class, 'notification'])->name('midtrans.notification');
Route::get('/undangan/{slug}', [InvitationController::class, 'showInvitation'])->name('invitation.show');
Route::get('/u/{slug}', [InvitationController::class, 'showInvitation'])->name('invitation.short');
Route::get('/demo/{templateKey}', [InvitationController::class, 'demoTemplate'])->name('invitation.demo');
Route::post('/rsvp', [InvitationController::class, 'rsvp'])->name('invitation.rsvp');
Route::post('/wish', [InvitationController::class, 'wish'])->name('invitation.wish');
