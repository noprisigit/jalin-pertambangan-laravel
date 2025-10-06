<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('admin.pages.feedback.feedback-index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'company' => ['required', 'string'],
            'message' => ['required', 'string'],
        ], [], [
            'name' => __('Nama'),
            'email' => __('Email'),
            'phone' => __('Nomor Telepon'),
            'company' => __('Perusahaan'),
            'message' => __('Pesan')
        ]);

        try {
            Feedback::query()->create($validated);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::sent_success('Pesan')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::sent_failed('Pesan');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Feedback $feedback)
    {
        return view('admin.pages.feedback.feedback-show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.pages.feedback.feedback-edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string', 'email'],
            'phone' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'message' => ['required', 'string'],
            'status' => ['required', 'in:publish,unpublish'],
        ], [], [
            'name' => __('Nama'),
            'email' => __('Email'),
            'phone' => __('Nomor Telepon'),
            'company' => __('Perusahaan'),
            'message' => __('Pesan'),
            'status' => __('Status')
        ]);

        try {
            $feedback->update($validated);

            return response()->json([
                'status' => true,
                'message' => FlashMsg::update_success('Tanggapan & Masukan')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::update_failed('Tanggapan & Masukan');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();

            return response()->json([
                'status' => true,
                'message' => FlashMsg::delete_success('Tanggapan & Masukan')
            ]);
        } catch (Exception $ex) {
            $message = config('app.debug') ? $ex->getMessage() : FlashMsg::delete_failed('Tanggapan & Masukan');

            return response()->json([
                'status' => false,
                'message' => $message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
