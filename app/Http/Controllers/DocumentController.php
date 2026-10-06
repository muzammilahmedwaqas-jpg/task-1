<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(DocumentUploadRequest $request){
        $file = $request->file('document');
        $fileName = time().'_'.$file->getClientOriginalName();
        $storedPath = $file->store('documents', 'public');
        $request->user()->documents()->create([
            'name' => $fileName,
            'path' => $storedPath
        ]);
        return back()->with('success', 'Document uploaded successfully!');
    }

    public function download(Request $request,Document $document){
        if ((int) $document->member_id !== (int) $request->user()->id) {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access: You do not own this document.');
        }

     
        if (!Storage::disk('public')->exists($document->path)) {
            abort(Response::HTTP_NOT_FOUND, 'The requested file does not exist on storage.');
        }
        return Storage::disk('public')->download($document->path, $document->filename);
    }
}
