<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product.product-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('admin.pages.product.product-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'product_category_id' => ['nullable'],
            'description' => ['required', 'string'],
            'price' => ['nullable', 'numeric'],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
            'attachments'  => ['nullable', 'array'],
            'attachments.*' => [
                'file',
                'mimes:jpg,jpeg,png',
                'max:5120' // 20MB per file
            ],
        ], [
            'thumbnail.mimes' => 'Thumbnail harus berupa format: :values.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 2 MB.',
            'attachments.*.mimes' => 'Setiap gambar produk harus berupa format: :values.',
            'attachments.*.max' => 'Ukuran setiap gambar produk tidak boleh lebih dari 5 MB.',
        ], [
            'name' => __('Judul'),
            'thumbnail' => __('Thumbnail'),
            'product_category_id' => __('Kategori'),
            'description' => __('Keterangan'),
            'attachments'  => __('Gambar Produk'),
            'price' => __('Harga')
        ]);

        try {
            DB::beginTransaction();

            $categoryId = null;
            if (isset($validated['product_category_id'])) {
                if (is_numeric($validated['product_category_id'])) {
                    $categoryId = $validated['product_category_id'];
                } else {
                    $newCategory = ProductCategory::query()->create([
                        'name' => $validated['product_category_id'],
                        'created_by' => Auth::id(),
                    ]);

                    $categoryId = $newCategory->id;
                }
            }

            $thumbnailPath = null;

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('uploads/products/thumbnails', 'public');
            }

            $product = Product::query()->create([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'product_category_id' => $categoryId,
                'description' => isset($validated['description']) ? $validated['description'] : null,
                'thumbnail' => $thumbnailPath,
                'created_by' => Auth::id(),
                'price' => isset($validated['price']) ? $validated['price'] : null
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $stored = $file->store("uploads/products/files/{$product->id}", 'public');

                    $product->files()->create([
                        'path'          => $stored,
                        'original_name' => $file->getClientOriginalName(),
                        'mime'          => $file->getMimeType(),
                        'size'          => $file->getSize(),
                        'created_by'    => Auth::id(),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::create_success('Produk')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::create_failed('Produk');

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
        $product = Product::query()
            ->with(['category', 'files', 'creator', 'updater'])
            ->findOrFail($id);

        return view('admin.pages.product.product-show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::query()->findOrFail($id);
        $categories = ProductCategory::all();

        return view('admin.pages.product.product-edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'product_category_id' => ['nullable'],
            'description' => ['required', 'string'],
            'price' => ['nullable', 'numeric'],
            'thumbnail' => ['nullable', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
            'attachments'  => ['nullable', 'array'],
            'attachments.*' => [
                'file',
                'mimes:jpg,jpeg,png',
                'max:5120' // 20MB per file
            ],
        ], [
            'thumbnail.mimes' => 'Thumbnail harus berupa format: :values.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 2 MB.',
            'attachments.*.mimes' => 'Setiap gambar produk harus berupa format: :values.',
            'attachments.*.max' => 'Ukuran setiap gambar produk tidak boleh lebih dari 5 MB.',
        ], [
            'name' => __('Judul'),
            'thumbnail' => __('Thumbnail'),
            'product_category_id' => __('Kategori'),
            'description' => __('Keterangan'),
            'attachments'  => __('Gambar Produk'),
            'price' => __('Harga')
        ]);

        $product = Product::query()->findOrFail($id);

        try {
            DB::beginTransaction();

            $categoryId = $product->product_category_id;
            if (isset($validated['product_category_id'])) {
                if (is_numeric($validated['product_category_id'])) {
                    $categoryId = $validated['product_category_id'];
                } else {
                    $newCategory = ProductCategory::query()->create([
                        'name' => $validated['product_category_id'],
                        'created_by' => Auth::id(),
                    ]);

                    $categoryId = $newCategory->id;
                }
            }

            $thumbnailPath =  $product->thumbnail ?? null;

            if ($request->hasFile('thumbnail')) {
                if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
                    Storage::disk('public')->delete($product->thumbnail);
                }

                $thumbnailPath = $request->file('thumbnail')->store('uploads/products/thumbnails', 'public');
            }

            $product->update([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'product_category_id' => $categoryId,
                'description' => isset($validated['description']) ? $validated['description'] : null,
                'thumbnail' => $thumbnailPath,
                'updated_by' => Auth::id(),
                'price' => isset($validated['price']) ? $validated['price'] : null
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $stored = $file->store("uploads/products/files/{$product->id}", 'public');

                    $product->files()->create([
                        'path'          => $stored,
                        'original_name' => $file->getClientOriginalName(),
                        'mime'          => $file->getMimeType(),
                        'size'          => $file->getSize(),
                        'updated_by' => Auth::id(),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Produk')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Produk');

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
        $product = Product::query()->with('files')->findOrFail($id);

        try {
            $product->files()->delete();
            $product->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Produk')
            ]);
        } catch (Exception $ex) {
            report($ex);
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Produk');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
