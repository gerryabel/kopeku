<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CatSubmissionController;
use Illuminate\Support\Facades\Mail;
use App\Mail\CatSubmissionStatusChanged;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AdoptionController as AdminAdoptionController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PhotoController as AdminPhotoController;
use App\Http\Controllers\Admin\AddressController as AdminAddressController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\ExportController as AdminExportController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('photos', PhotoController::class);

// Auth (login & register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

Route::get('/adopsi', [AdoptionController::class, 'index'])->name('adoptions.index');

Route::middleware('auth')->group(function () {
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{forum:slug}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{forum:slug}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{forum:slug}', [ForumController::class, 'destroy'])->name('forum.destroy');
    Route::delete('/forum/{forum}/force-delete', [ForumController::class, 'forceDelete'])->name('forum.forceDelete')
        ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
    Route::post('/forum/{forum}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/adopsi/{cat}/create', [AdoptionController::class, 'create'])->name('adoptions.create');
    Route::post('/adopsi/{cat}', [AdoptionController::class, 'store'])->name('adoptions.store');
    Route::get('/adopsi/{adoption}/edit', [AdoptionController::class, 'edit'])->name('adoptions.edit');
    Route::put('/adopsi/{adoption}', [AdoptionController::class, 'update'])->name('adoptions.update');
    Route::delete('/adoptions/{id}', [AdoptionController::class, 'destroy'])->name('adoptions.destroy');
    Route::get('/adopsi/notifications', [AdoptionController::class, 'notifications'])->name('adoptions.notifications');
    Route::post('/adopsi/notifications/{id}/read', [AdoptionController::class, 'markAsRead'])->name('adoptions.notifications.read');
    Route::post('/adopsi/notifications/read-all', [AdoptionController::class, 'markAllAsRead'])->name('adoptions.notifications.readAll');

    Route::get('/adoptions/mycatsubmissions', [CatSubmissionController::class, 'index'])->name('adoptions.catsubmission.index');
    Route::get('/adoptions/catsubmission/create', [CatSubmissionController::class, 'create'])->name('adoptions.catsubmission.create');
    Route::post('/adoptions/catsubmission', [CatSubmissionController::class, 'store'])->name('catsubmission.store');
    Route::get('/adoptions/catsubmission/{id}/edit', [CatSubmissionController::class, 'edit'])->name('adoptions.catsubmission.edit');
    Route::put('/adoptions/catsubmission/{id}', [CatSubmissionController::class, 'update'])->name('adoptions.catsubmission.update');
    Route::delete('/adoptions/catsubmission/{id}', [CatSubmissionController::class, 'destroy'])->name('adoptions.catsubmission.destroy');
    Route::get('/adoptions/catsubmission/{type}/{id}', [CatSubmissionController::class, 'show'])->name('adoptions.catsubmission.show');
});

Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->group(function () {
    Route::post('/admin/users/{id}/ban', [AdminUserController::class, 'banUser'])->name('admin.users.ban');
});

Route::get('/forum/{forum:slug}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/adopsi/{cat}', [AdoptionController::class, 'show'])->name('adoptions.show');

// Artikel publik
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// ---------------------------
// ADMIN ROUTES
// ---------------------------

Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Kelola User
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/ban', [AdminUserController::class, 'ban'])->name('users.ban');
        Route::patch('/users/{user}/unban', [AdminUserController::class, 'unban'])->name('users.unban');
        Route::resource('/users', AdminUserController::class)->except(['show']);

        // Kelola forum
        Route::resource('forum', \App\Http\Controllers\AdminForumController::class);
        Route::get('/forum', [AdminForumController::class, 'index'])->name('forum.index');
        Route::get('/forum/{forum}', [AdminForumController::class, 'show'])->name('forum.show');
        Route::get('/forum/create', [AdminForumController::class, 'create'])->name('forum.create');
        Route::post('/forum', [AdminForumController::class, 'store'])->name('forum.store');
        Route::post('/forum/{forum}/comment', [AdminForumController::class, 'storeComment'])->name('forum.comment.store');
        Route::get('/forum/{forum}/edit', [AdminForumController::class, 'edit'])->name('forum.edit');
        Route::put('/forum/{forum}', [AdminForumController::class, 'update'])->name('forum.update');
        Route::put('admin/forum/{forum}/comment/{comment}', [AdminForumController::class, 'updateComment'])->name('forum.comment.update');
        Route::delete('admin/forum/{forum}/comment/{comment}', [AdminForumController::class, 'deleteComment'])->name('forum.comment.destroy');
        Route::delete('/forum/{forum}', [AdminForumController::class, 'destroy'])->name('forum.destroy');

        // Kelola galeri
        Route::resource('photos', AdminPhotoController::class);

        // Kelola Artikel
        Route::resource('articles', AdminArticleController::class);

        // Kelola Kategori Artikel
        Route::resource('categories', AdminCategoryController::class)->except(['show']);

        Route::get('/adoptions', [AdminAdoptionController::class, 'index'])->name('adoptions.index');

        // CRUD kucing
        Route::get('/adoptions/cats/create', [AdminAdoptionController::class, 'createCat'])->name('adoptions.cats.create');
        Route::post('/adoptions/cats', [AdminAdoptionController::class, 'storeCat'])->name('adoptions.cats.store');
        Route::get('/adoptions/cats/{cat}', [AdminAdoptionController::class, 'show'])->name('adoptions.cats.show');
        Route::get('/adoptions/cats/{cat}/edit', [AdminAdoptionController::class, 'editCat'])->name('adoptions.cats.edit');
        Route::put('/adoptions/cats/{cat}', [AdminAdoptionController::class, 'updateCat'])->name('adoptions.cats.update');
        Route::delete('/adoptions/cats/{cat}', [AdminAdoptionController::class, 'destroyCat'])->name('adoptions.cats.destroy');

        Route::post('cat-submissions/{id}/approve', [AdminAdoptionController::class, 'approveCatSubmission'])->name('cat-submissions.approve');
        Route::post('cat-submissions/{id}/reject', [AdminAdoptionController::class, 'rejectCatSubmission'])->name('cat-submissions.reject');

        Route::get('/adoptions/cat-submissions/{id}', [AdminAdoptionController::class, 'catSubmissionShow'])
            ->name('adoptions.cat-submissions.show');

        // Approve / Reject pengajuan adopsi
        Route::post('/adoptions/{id}/approve', [AdminAdoptionController::class, 'approve'])->name('adoptions.approve');
        Route::post('/adoptions/{id}/reject', [AdminAdoptionController::class, 'reject'])->name('adoptions.reject');

        Route::resource('addresses', AdminAddressController::class)->except('show');
        Route::resource('breeds', AdminBreedController::class)->except('show');

        Route::resource('breeds', AdminBreedController::class)->except(['show']);

        // Export Excel
        Route::get('/adoptions/export', [AdminExportController::class, 'exportAdoptions'])->name('adoptions.export');
    });
