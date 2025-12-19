<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [WebController::class, 'home'])->name('home');

// Static Pages
Route::get('/halaman/{slug}', [WebController::class, 'page'])->name('page');

// Academic
Route::get('/jurusan', [WebController::class, 'majors'])->name('majors');
Route::get('/jurusan/{major:slug}', [WebController::class, 'majorShow'])->name('major.show');
Route::get('/ekstrakurikuler', [WebController::class, 'extracurriculars'])->name('extracurriculars');
Route::get('/prestasi', [WebController::class, 'achievements'])->name('achievements');

// Directory
Route::get('/daftar-guru', [WebController::class, 'teachers'])->name('teachers');
Route::get('/daftar-staff', [WebController::class, 'staff'])->name('staff');
Route::get('/business-center', [WebController::class, 'businessCenters'])->name('business-centers');

// Gallery
Route::get('/foto-sekolah', [WebController::class, 'galleryPhotos'])->name('gallery.photos');
Route::get('/video-sekolah', [WebController::class, 'galleryVideos'])->name('gallery.videos');

// News
Route::get('/berita', [WebController::class, 'news'])->name('news');
Route::get('/berita/{news:slug}', [WebController::class, 'newsShow'])->name('news.show');

// Contact
Route::get('/kontak', [WebController::class, 'contact'])->name('contact');
