<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.post.post-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();

        return view('admin.pages.post.post-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'post_category_id' => ['nullable'],
            'content_html' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // buang semua tag HTML lalu cek kosong
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }
                }
            ],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
            'attachments'  => ['nullable', 'array'],
            'attachments.*' => [
                'file',
                'mimes:pdf,jpg,jpeg,png,gif,webp,doc,docx,xls,xlsx,ppt,pptx',
                'max:5120' // 20MB per file
            ],
            'status' => ['required', 'string', 'in:draft,publish,unpublish'],
        ], [
            'thumbnail.mimes' => 'Thumbnail harus berupa format: :values.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 2 MB.',
            'attachments.*.mimes' => 'Setiap file lampiran harus berupa format: :values.',
            'attachments.*.max' => 'Ukuran setiap file lampiran tidak boleh lebih dari 5 MB.',
        ], [
            'title' => __('Judul'),
            'thumbnail' => __('Thumbnail'),
            'post_category_id' => __('Kategori'),
            'content_html' => 'Isi Konten',
            'attachments'  => 'Bukti Dukung',
            'status' => __('Status')
        ]);

        try {
            DB::beginTransaction();

            $categoryId = null;
            if (isset($validated['post_category_id'])) {
                if (is_numeric($validated['post_category_id'])) {
                    $categoryId = $validated['post_category_id'];
                } else {
                    $newCategory = PostCategory::query()->create([
                        'nama' => $validated['post_category_id'],
                        'created_by' => Auth::id(),
                    ]);

                    $categoryId = $newCategory->id;
                }
            }

            $thumbnailPath = 'assets/logo-sigap1.png';

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('uploads/posts/thumbnails', 'public');
            }

            $validated['status'] = isset($validated['status']) ? $validated['status'] : 'draft';

            $post = Post::query()->create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'post_category_id' => $categoryId,
                'content' => $validated['content_html'],
                'thumbnail' => $thumbnailPath,
                'user_id' => Auth::user()->id,
                'created_by' => Auth::id(),
                'status' => $validated['status']
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $stored = $file->store("uploads/posts/files/{$post->id}", 'public');

                    $post->files()->create([
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
                'message' => FlashMsg::create_success('Artikel')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::create_failed('Artikel');

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
        return view('admin.pages.post.post-show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('files', 'category')->findOrFail($id);
        $categories = PostCategory::all();

        return view('admin.pages.post.post-edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'post_category_id' => ['nullable', 'integer'],
            'content_html' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // buang semua tag HTML lalu cek kosong
                    if (trim(strip_tags($value)) === '') {
                        $fail('Konten tidak boleh kosong.');
                    }
                }
            ],
            'thumbnail' => ['nullable', 'mimes:png,jpeg,jpg', 'mimetypes:image/png,image/jpg,image/jpeg', 'max:2048'],
            'attachments'  => ['nullable', 'array'],
            'attachments.*' => [
                'file',
                'mimes:pdf,jpg,jpeg,png,gif,webp,doc,docx,xls,xlsx,ppt,pptx',
                'max:5120' // 20MB per file
            ],
            'status' => ['required', 'string', 'in:draft,publish,unpublish']
        ], [
            'thumbnail.mimes' => 'Thumbnail harus berupa format: :values.',
            'thumbnail.max' => 'Ukuran file thumbnail tidak boleh lebih dari 2 MB.',
            'attachments.*.mimes' => 'Setiap file lampiran harus berupa format: :values.',
            'attachments.*.max' => 'Ukuran setiap file lampiran tidak boleh lebih dari 5 MB.',
        ], [
            'title' => __('Judul'),
            'thumbnail' => __('Thumbnail'),
            'post_category_id' => __('Kategori'),
            'content_html' => 'Isi Konten',
            'attachments'  => 'Bukti Dukung',
            'status' => __('Status')
        ]);

        $post = Post::query()->findOrFail($id);

        try {
            DB::beginTransaction();

            $categoryId = $post->post_category_id;
            if (isset($validated['post_category_id'])) {
                if (is_numeric($validated['post_category_id'])) {
                    $categoryId = $validated['post_category_id'];
                } else {
                    $newCategory = PostCategory::query()->create([
                        'nama' => $validated['post_category_id'],
                        'created_by' => Auth::id(),
                    ]);

                    $categoryId = $newCategory->id;
                }
            }

            $thumbnailPath =  $post->thumbnail ?? 'assets/logo-sigap1.png';

            if ($request->hasFile('thumbnail')) {
                if ($post->thumbnail && $post->thumbnail !== 'assets/logo-sigap1.png' && Storage::disk('public')->exists($post->thumbnail)) {
                    Storage::disk('public')->delete($post->thumbnail);
                }

                $thumbnailPath = $request->file('thumbnail')->store('uploads/posts/thumbnails', 'public');
            }

            $post->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'post_category_id' => $categoryId,
                'content' => $validated['content_html'],
                'thumbnail' => $thumbnailPath,
                'updated_by' => Auth::id(),
                'region_id' => Auth::user()->region_id,
                'status' => $validated['status']
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $stored = $file->store("uploads/posts/files/{$post->id}", 'public');

                    $post->files()->create([
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
                'message' => FlashMsg::update_success('Artikel')
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Artikel');

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
        $post = Post::query()->findOrFail($id);

        try {
            $post->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Artikel')
            ]);
        } catch (Exception $ex) {
            report($ex);
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Artikel');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteFile($id)
    {
        $file = PostFile::query()->findOrFail($id);

        try {
            // Hapus file fisik
            Storage::disk('public')->delete($file->path);

            // Hapus data dari database
            $file->delete();

            return response()->json([
                'success' => true,
                'message' => FlashMsg::delete_success('Lampiran Artikel')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Lampiran Artikel');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
