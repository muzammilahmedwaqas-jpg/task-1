<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    public function store(DocumentUploadRequest $request)
    {
        $file = $request->file('document');

        $originalFilename = $file->getClientOriginalName();

        
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        $relativePath = Storage::disk('public')->putFileAs('documents', $file->getPathname(), $filename);


        $request->user()->documents()->create([
            'filename' => $originalFilename,
            'path' => $relativePath,
        ]);

        return back()->with('status', 'Document uploaded successfully.');
    }

    public function download(Request $request, Document $document)
    {
        $user = $request->user();

        if (!$user->is_admin && (int) $document->member_id !== (int) $user->id) {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access: You do not own this document.');
        }

        if (!Storage::disk('public')->exists($document->path)) {
            abort(Response::HTTP_NOT_FOUND, 'File not found on storage.');
        }

        return Storage::disk('public')->download($document->path, $document->filename);
    }
}