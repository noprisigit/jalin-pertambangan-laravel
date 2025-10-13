<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.service.service-index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['required', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
        ], [
            'icon.mimes' => 'Icon harus berupa format: :values.',
            'icon.max' => 'Ukuran file icon tidak boleh lebih dari 2 MB.',
        ], [
            'name' => __('Nama Layanan'),
            'description' => __('Keterangan'),
            'icon' => __('Icon')
        ]);

        DB::beginTransaction();

        try {
            $iconPath = null;
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('uploads/services/icon', 'public');
            }

            Service::query()->create([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'description' => $validated['description'],
                'icon' => $iconPath,
                'created_by' => Auth::id()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::create_success('Layanan')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::create_failed('Layanan');

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
        ], [
            'icon.mimes' => 'Icon harus berupa format: :values.',
            'icon.max' => 'Ukuran file icon tidak boleh lebih dari 2 MB.',
        ], [
            'name' => __('Nama Layanan'),
            'description' => __('Keterangan'),
            'icon' => __('Icon')
        ]);

        $service = Service::query()->findOrFail($id);

        DB::beginTransaction();

        try {
            $iconPath = $service->icon;
            if ($request->hasFile('icon')) {
                if (Storage::exists($iconPath)) {
                    Storage::delete($iconPath);
                }

                $iconPath = $request->file('icon')->store('uploads/services/icon', 'public');
            }

            $service->update([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'description' => $validated['description'],
                'icon' => $iconPath,
                'updated_by' => Auth::id()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Layanan')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Layanan');

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
        $service = Service::query()->findOrFail($id);

        try {
            if ($service->icon && Storage::exists($service->icon)) {
                Storage::delete($service->icon);
            }

            $service->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Layanan')
            ]);
        } catch (Exception $ex) {
            report($ex);
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Layanan');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
