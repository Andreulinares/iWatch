<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $orderColumn = request('order_column', 'created_at');
        if (!in_array($orderColumn, ['id', 'name', 'apellido', 'phone', 'created_at'])) {
            $orderColumn = 'created_at';
        }
        $orderDirection = request('order_direction', 'desc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'desc';
        }
        $users = User::
        when(request('search_id'), function ($query) {
            $query->where('id', request('search_id'));
        })
            ->when(request('search_title'), function ($query) {
                $query->where('name', 'like', '%'.request('search_title').'%');
            })
            ->when(request('search_global'), function ($query) {
                $query->where(function($q) {
                    $q->where('id', request('search_global'))
                        ->orWhere('name', 'like', '%'.request('search_global').'%');

                });
            })
            ->orderBy($orderColumn, $orderDirection)
            ->paginate(50);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request)
    {
        $role = Role::find($request->role_id);
        $user = new User();
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $phone->phone = $request->phone;

        if ($user->save()) {
            if ($role) {
                $user->assignRole($role);
            }
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return UserResource
     */
    public function show(User $user)
    {
        $user->load('roles');
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $role = Role::find($request->role_id);

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password) ?? $user->password;
        }

        if ($user->save()) {
            if ($role) {
                $user->syncRoles($role);
            }
            return new UserResource($user);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('user-delete');
        $user->delete();

        return response()->noContent();
    }

    public function uploadProfileImage(Request $request)
{
    $user = auth()->user();

    if ($request->hasFile('profile_image')) {
        $media = $user->addMediaFromRequest('profile_image')
                      ->toMediaCollection('images-profile');

        // Verifica si la imagen se ha almacenado correctamente
        if ($media) {
            // Obtiene la URL de la imagen almacenada
            $imageUrl = $media->getUrl();

            // Actualiza el campo profile_image en la base de datos
            $user->profile_image = $imageUrl;
            $user->save();

            // Devuelve la URL de la imagen
            return response()->json(['url' => $imageUrl], 200);
        } else {
            return response()->json(['error' => 'Error al guardar la imagen'], 500);
        }
    }

    return response()->json(['error' => 'No se ha proporcionado ninguna imagen'], 400);
}

    

    public function getUserProfileImage()
    {
    $user = auth()->user(); // Obtén el usuario actualmente autenticado
    $profileImage = $user->profile_image; // Obtén la URL de la imagen del perfil del usuario desde la base de datos

    // Verifica si la imagen existe en el sistema de archivos
    if (Storage::exists($profileImage)) {
        return response()->file(storage_path('app/' . $profileImage));
    }

    // Si no se encuentra la imagen, devuelve una imagen de marcador de posición u otra respuesta adecuada
    return response()->json(['error' => 'No se encontró la imagen del perfil'], 404);
    }
}
