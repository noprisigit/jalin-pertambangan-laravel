<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.post.category.category-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:post_categories,name']
        ], [], [
            'name' => __('Nama Kategori')
        ]);

        try {
            $validated['created_by'] = Auth::id();
            PostCategory::query()->create($validated);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::create_success('Kategori')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::create_failed('Kategori');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:post_categories,name,' . $id]
        ], [], [
            'name' => __('Nama Kategori')
        ]);

        $postCategory = PostCategory::query()->findOrFail($id);

        try {
            $validated['updated_by'] = Auth::id();
            $postCategory->update($validated);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Kategori')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Kategori');

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
        $postCategory = PostCategory::query()->findOrFail($id);

        try {
            $postCategory->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Kategori')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Kategori');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
