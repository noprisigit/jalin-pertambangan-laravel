<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SystemSettingController extends Controller
{
    public function index()
    {
        return view('admin.pages.setting.setting-index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'workingHour' => ['required', 'string'],
        ], [], [
            'email' => __('Email'),
            'phone' => __('Nomor Telepon'),
            'address' => __('Alamat Kantor'),
            'workingHour' => __('Jam Kerja'),
        ]);

        try {
            DB::beginTransaction();

            setStaticContent(key: 'email', content: $validated['email']);
            setStaticContent(key: 'phone', content: $validated['phone']);
            setStaticContent(key: 'address', content: $validated['address']);
            setStaticContent(key: 'workingHour', content: $validated['workingHour']);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::save_success('Pengaturan Umum')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::save_failed('Pengaturan Umum');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function storeSocialMedia(Request $request)
    {
        $validated = $request->validate([
            'linkedin' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'tiktok' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
        ], [], [
            'linkedin' => __('Linkedin'),
            'facebook' => __('Facebook'),
            'instagram' => __('Instagram'),
            'twitter' => __('Twitter'),
            'tiktok' => __('Tiktok'),
            'youtube' => __('YouTube'),
        ]);

        try {
            DB::beginTransaction();

            if (isset($validated['website'])) {
                setStaticContent(key: 'website', content: $validated['website']);
            }

            if (isset($validated['linkedin'])) {
                setStaticContent(key: 'linkedin', content: $validated['linkedin']);
            }

            if (isset($validated['facebook'])) {
                setStaticContent(key: 'facebook', content: $validated['facebook']);
            }

            if (isset($validated['instagram'])) {
                setStaticContent(key: 'instagram', content: $validated['instagram']);
            }

            if (isset($validated['twitter'])) {
                setStaticContent(key: 'twitter', content: $validated['twitter']);
            }

            if (isset($validated['tiktok'])) {
                setStaticContent(key: 'tiktok', content: $validated['tiktok']);
            }

            if (isset($validated['youtube'])) {
                setStaticContent(key: 'youtube', content: $validated['youtube']);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::save_success('Media Sosial')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::save_failed('Media Sosial');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
