<?php

namespace App\Http\Controllers\Student;

use App\Models\Certificate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ImageKit\ImageKit;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();

        // Get the authenticated user's student ID
        $studentId = Auth::user()->student->id;

        // Handle file upload
        if ($request->hasFile('image')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('image');
            $studentId = Auth::user()->student->id;

            $fileName = 'certificate_' . $studentId . '_' . \Illuminate\Support\Str::snake($validated['certificate_name']) . '.jpg';
            $folderPath = '/next-step/students/certifications/';

            $uploadFile = $imageKit->uploadFile([
                'file' => fopen($file->getPathname(), 'r'),
                'fileName' => $fileName,
                'folder' => $folderPath,
                'useUniqueFileName' => false,
                'overwriteFile' => true,
                'overwriteAITags' => true,
                'overwriteTags' => true,
                'overwriteCustomMetadata' => true
            ]);

            if ($uploadFile && isset($uploadFile->result)) {
                // Get the file ID from upload response
                $fileId = $uploadFile->result->fileId;

                // Fetch complete file details to get URL
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL
                    $validated['certificate_image'] = $fileDetails->result->url;
                } else {
                    return redirect()->back()->with('error', 'Failed to get image details');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Map form fields to database fields
        $certificateData = [
            'student_id' => $studentId,
            'title' => $validated['certificate_name'],
            'issuer' => $validated['issuing_organization'],
            'issue_date' => $validated['issue_date'],
            'description' => $validated['description'] ?? null,
            'certificate_image' => $validated['certificate_image'] ?? null,
            'certificate_link' => $validated['certificate_url'] ?? null,
        ];

        Certificate::create($certificateData);

        return redirect()->back()->with('success', 'Certificate added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        // Check if the certificate belongs to the authenticated user
        if ($certificate->student_id !== Auth::user()->student->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();        // Handle file upload
        if ($request->hasFile('image')) {
            // Initialize ImageKit
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_URL_ENDPOINT')
            );

            $file = $request->file('image');
            $studentId = Auth::user()->student->id;

            $fileName = 'certificate_' . $studentId . '_' . \Illuminate\Support\Str::snake($validated['certificate_name']) . '.jpg';
            $folderPath = '/next-step/students/certifications/';

            $uploadFile = $imageKit->uploadFile([
                'file' => fopen($file->getPathname(), 'r'),
                'fileName' => $fileName,
                'folder' => $folderPath,
                'useUniqueFileName' => false,
                'overwriteFile' => true,
                'overwriteAITags' => true,
                'overwriteTags' => true,
                'overwriteCustomMetadata' => true
            ]);

            if ($uploadFile && isset($uploadFile->result)) {
                // Get the file ID from upload response
                $fileId = $uploadFile->result->fileId;

                // Fetch complete file details to get URL
                $fileDetails = $imageKit->getFileDetails($fileId);

                if ($fileDetails && isset($fileDetails->result)) {
                    // Use the complete URL
                    $validated['certificate_image'] = $fileDetails->result->url;
                } else {
                    return redirect()->back()->with('error', 'Failed to get image details');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Map form fields to database fields
        $certificateData = [
            'title' => $validated['certificate_name'],
            'issuer' => $validated['issuing_organization'],
            'issue_date' => $validated['issue_date'],
            'description' => $validated['description'] ?? null,
            'certificate_link' => $validated['certificate_url'] ?? null,
        ];

        // Only update image if new one was uploaded
        if (isset($validated['certificate_image'])) {
            $certificateData['certificate_image'] = $validated['certificate_image'];
        }

        $certificate->update($certificateData);

        return redirect()->back()->with('success', 'Certificate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {        // Check if the certificate belongs to the authenticated user
        if ($certificate->student_id !== Auth::user()->student->id) {
            abort(403, 'Unauthorized action.');
        }

        // Note: ImageKit files are managed externally, no local file deletion needed

        $certificate->delete();

        return redirect()->back()->with('success', 'Certificate deleted successfully!');
    }
}
