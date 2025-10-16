<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product.category.category-index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:product_categories,name']
        ], [], [
            'name' => __('Nama Kategori')
        ]);

        try {
            $validated['created_by'] = Auth::id();
            ProductCategory::query()->create($validated);

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:product_categories,name,' . $id]
        ], [], [
            'name' => __('Nama Kategori')
        ]);

        $productCategory = ProductCategory::query()->findOrFail($id);

        try {
            $validated['updated_by'] = Auth::id();
            $productCategory->update($validated);

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
        $productCategory = ProductCategory::query()->findOrFail($id);

        try {
            $productCategory->delete();

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
