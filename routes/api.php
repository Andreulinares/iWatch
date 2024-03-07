<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\FilmsController;
use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Api\SuscripcionController;
use App\http\Controllers\Api\ReviewsController;
use App\http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\CategoriasController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::get('tasks', [TaskController::class,'index']);
Route::post('tasks/', [TaskController::class, 'store']);
Route::put('tasks/update/{id}',[TaskController::class, 'update']);
Route::delete('tasks/{id}',[TaskController::class, 'destroy']);

// Acciones admin peliculas
Route::get('films', [FilmsController::class,'index']);
Route::post('films/', [FilmsController::class, 'store']);
Route::put('films/update/{id}',[FilmsController::class, 'update']);
Route::delete('films/{id}',[FilmsController::class, 'destroy']);

// Mostrar pelicula por ID
Route::get('films/{filmId}', [FilmsController::class,'show']); 

// Acciones admin series
Route::get('series', [SeriesController::class,'index']);
Route::post('series/', [SeriesController::class, 'store']);
Route::put('series/update/{id}',[SeriesController::class, 'update']);
Route::delete('series/{id}',[SeriesController::class, 'destroy']);

// Acciones admin suscripciones
Route::get('suscripciones', [SuscripcionController::class,'index']);
Route::post('suscripciones/', [SuscripcionController::class, 'store']);
Route::put('suscripciones/update/{id}',[SuscripcionController::class, 'update']);
Route::delete('suscripciones/{id}',[SuscripcionController::class, 'destroy']);

// Acciones admin reseñas
Route::get('reviews', [ReviewsController::class,'index']);
Route::post('reviews/', [ReviewsController::class, 'store']);
Route::put('reviews/update/{id}',[ReviewsController::class, 'update']);
Route::delete('reviews/{id}',[ReviewsController::class, 'destroy']);

// Acciones admin mensajes
Route::get('messages', [MessagesController::class,'index']);
Route::post('messages/', [MessagesController::class, 'store']);
Route::put('messages/update/{id}',[MessagesController::class, 'update']);
Route::delete('messages/{id}',[MessagesController::class, 'destroy']);

// Acciones admin salas
Route::get('rooms', [RoomsController::class,'index']);
Route::post('rooms/', [RoomsController::class, 'store']);
Route::put('rooms/update/{id}',[RoomsController::class, 'update']);
Route::delete('rooms/{id}',[RoomsController::class, 'destroy']);

// Acciones admin categorias
Route::get('categorias', [CategoriasController::class,'index']);
Route::post('categorias/', [CategoriasController::class, 'store']);
Route::put('categorias/update/{id}',[CategoriasController::class, 'update']);
Route::delete('categorias/{id}',[CategoriasController::class, 'destroy']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('roles', RoleController::class);
    //Route::apiResource('exercises', ExerciseController::class);
    Route::post('exercises/', [ExerciseController::class,'store']); //Guardar
    Route::get('exercises', [ExerciseController::class,'index']); //Listar
    Route::get('exercises/{exercise}', [ExerciseController::class,'show']); //Mostrar
    Route::post('exercises/update/{id}', [ExerciseController::class,'update']); //Editar

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);
    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::put('/user', [ProfileController::class, 'update']);

    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });
});


Route::get('category-list', [CategoryController::class, 'getList']);
Route::get('get-posts', [PostController::class, 'getPosts']);
Route::get('get-category-posts/{id}', [PostController::class, 'getCategoryByPosts']);
Route::get('get-post/{id}', [PostController::class, 'getPost']);
