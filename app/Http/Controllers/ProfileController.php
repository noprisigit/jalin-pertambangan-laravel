<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.pages.profile.profile-index', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
        ], [], [
            'name' => __('Nama Lengkap'),
            'email' => __('Email'),
        ]);

        try {
            $user->update($validated);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Profil')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Profil');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changePassword()
    {
        return view('apps.pages.profile.profile-change-password');
    }

    public function doChangePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'same:password']
        ], [], [
            'password' => __('Kata Sandi Baru'),
            'password_confirmation' => __('Konfirmasi Kata Sandi')
        ]);

        $user = Auth::user();

        try {
            $newPassword = bcrypt($validated['password']);

            $user->update([
                'password' => $newPassword,
            ]);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Kata Sandi')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Kata Sandi');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
