<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.user.user-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'password_confirmation' => ['required', 'string', 'same:password'],
        ], [], [
            'name' => __('Nama Lengkap'),
            'email' => __('Email'),
            'password' => __('Kata Sandi'),
            'password_confirmation' => __('Konfirmasi Kata Sandi'),
        ]);

        try {
            $user = User::query()->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::create_success('Pengguna')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::create_failed('Pengguna');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);

        return view('admin.pages.user.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string'],
            'password_confirmation' => ['nullable', 'required_with:password', 'string', 'same:password'],
        ], [], [
            'name' => __('Nama Lengkap'),
            'email' => __('Email'),
            'password' => __('Kata Sandi'),
            'password_confirmation' => __('Konfirmasi Kata Sandi'),
        ]);

        $user = User::query()->findOrFail($id);

        try {
            $password = $user->password;
            if (isset($validated['password'])) {
                $password = bcrypt($validated['password']);
            }

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $password,
            ]);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Pengguna')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Pengguna');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()->findOrFail($id);

        try {
            $user->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Pengguna')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Pengguna');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
