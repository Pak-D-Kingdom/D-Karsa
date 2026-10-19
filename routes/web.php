<?php

use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
Route::get('/buat-undangan', [InvitationController::class, 'create'])->name('invitation.create');
Route::post('/buat-undangan', [InvitationController::class, 'store'])->name('invitation.store');
Route::get('/buat-undangan/sukses/{slug}', [InvitationController::class, 'success'])->name('invitation.success');
Route::get('/undangan/{slug}', [InvitationController::class, 'showInvitation'])->name('invitation.show');
Route::get('/u/{slug}', [InvitationController::class, 'showInvitation'])->name('invitation.short');
Route::get('/demo/{templateKey}', [InvitationController::class, 'demoTemplate'])->name('invitation.demo');
Route::post('/rsvp', [InvitationController::class, 'rsvp'])->name('invitation.rsvp');
Route::post('/wish', [InvitationController::class, 'wish'])->name('invitation.wish');
