<?php

use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Student\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Student\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Student\Auth\NewPasswordController;
use App\Http\Controllers\Student\Auth\PasswordResetLinkController;
use App\Http\Controllers\Student\Auth\RegisteredUserController;
use App\Http\Controllers\Student\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:student')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:student');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:student')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:student');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:student')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:student')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:student')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:student')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('student')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['student', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['student', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('student')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('student');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('student')
                ->name('logout');
