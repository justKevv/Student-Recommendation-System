<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Company;
use ImageKit\ImageKit;
use App\Models\Student;
use App\Models\Supervisors;
use App\Models\User;
use App\Services\NimGeneratorService;
use App\Services\NidnGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ManagementController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::with(['student', 'admin', 'supervisor'])->paginate(10);
        $companies = Company::paginate(10);


        return view('manage', compact('user', 'users', 'companies'));
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
        $request->validate([
            'role' => ['required', 'in:admin,student,supervisor'],
        ]);
        if ($request->role == 'student') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'major' => ['required', 'in:informatics_engineering,business_information_systems'],
                'phone' => ['required', 'numeric'],
                'semester' => ['required', 'numeric'],
            ]);

            $generatedNIM = NimGeneratorService::generate($request->semester, $request->major);

            $user = User::create([
                'name' => $request->name,
                'email' => $generatedNIM . '@' . $request->role . '.polinema.ac.id',
                'password' => bcrypt($generatedNIM),
                'phone' => $request->phone,
                'profile_picture' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/user/blank-profile-picture-973460_1920.png',
                'role' => $request->role,
            ]);

            Student::create([
                'user_id' => $user->id,
                'nim' => $generatedNIM,
                'study_program' => ($request->major == 'informatics_engineering') ? 'Informatics Engineering' : 'Business Information Systems',
                'semester' => $request->semester,
            ]);
        } elseif ($request->role == 'supervisor') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'numeric'],
                'teaching_start_year' => ['required', 'numeric', 'min:1990', 'max:2030'],
            ]);

            $generatedNIDN = NidnGeneratorService::generate($request->teaching_start_year);

            $user = User::create([
                'name' => $request->name,
                'email' => $generatedNIDN . '@' . $request->role . '.polinema.ac.id',
                'password' => bcrypt($generatedNIDN),
                'phone' => $request->phone,
                'profile_picture' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/user/blank-profile-picture-973460_1920.png',
                'role' => $request->role,
            ]);

            Supervisors::create([
                'user_id' => $user->id,
                'nidn' => $generatedNIDN,
                'expertise_areas' => [],
                'research_interests' => [],
            ]);
        } elseif ($request->role == 'admin') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'numeric'],
            ]);

            // Generate employee ID by counting existing admins + 1
            $employeeId = Admin::count() + 1;

            // Generate secure password
            $securePassword = Str::random(12);

            $user = User::create([
                'name' => $request->name,
                'email' => 'admin' . $employeeId . '@admin.polinema.ac.id',
                'password' => bcrypt($securePassword),
                'phone' => $request->phone,
                'profile_picture' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/user/blank-profile-picture-973460_1920.png',
                'role' => $request->role,
            ]);

            Admin::create([
                'user_id' => $user->id,
                'employee_id' => $employeeId,
            ]);

            // Store the generated password in session to display to admin
            session()->flash('admin_password', $securePassword);
            session()->flash('admin_email', 'admin' . $employeeId . '@admin.polinema.ac.id');
        }

        return redirect()->route('user.management');
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry_field' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'description' => 'nullable|string',
            'nice_to_have' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $companyData = $request->only([
            'name',
            'industry_field',
            'address',
            'city',
            'province',
            'postal_code',
            'website',
            'email',
            'description'
        ]);

        if ($request->filled('nice_to_have')) {
            $lines = array_filter(preg_split('/\r\n|\r|\n/', $request->nice_to_have), function ($line) {
                return trim($line) !== '';
            });
            $companyData['nice_to_have'] = array_values($lines);
        }

        $companyData['profile_picture'] = 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/user/blank-profile-picture-973460_1920.png';

        $company = Company::create($companyData);

        if ($request->hasFile('profile_picture')) {
            try {
                $imageKit = new ImageKit(
                    env('IMAGEKIT_PUBLIC_KEY'),
                    env('IMAGEKIT_PRIVATE_KEY'),
                    env('IMAGEKIT_URL_ENDPOINT')
                );
                $file = $request->file('profile_picture');
                $fileName = 'company_profile_' . $company->id;
                $folderPath = '/next-step/companies/company_profile/';

                $uploadFile = $imageKit->uploadFile([
                    'file' => fopen($file->getRealPath(), 'r'),
                    'fileName' => $fileName,
                    'folder' => $folderPath,
                    'useUniqueFileName' => false,
                    'overwriteFile' => true,
                ]);

                if ($uploadFile && isset($uploadFile->result)) {
                    $fileDetails = $imageKit->getFileDetails($uploadFile->result->fileId);
                    if ($fileDetails && isset($fileDetails->result)) {
                        $company->profile_picture = $fileDetails->result->url;
                        $company->save();
                    }
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Profile picture upload failed: ' . $e->getMessage())->withInput();
            }
        }

        return redirect()->route('user.management')->with('success', 'Company added successfully!');
    }

    public function updateCompany(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry_field' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $id,
            'description' => 'nullable|string',
            'nice_to_have' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $company = Company::findOrFail($id);

        $data = $request->only([
            'name',
            'industry_field',
            'address',
            'city',
            'province',
            'postal_code',
            'website',
            'email',
            'description'
        ]);

        if ($request->filled('nice_to_have')) {
            $lines = array_filter(preg_split('/\r\n|\r|\n/', $request->nice_to_have), function ($line) {
                return trim($line) !== '';
            });
            $data['nice_to_have'] = array_values($lines);
        } else {
            $data['nice_to_have'] = [];
        }

        if ($request->hasFile('profile_picture')) {
            try {
                // Initialize ImageKit
                $imageKit = new ImageKit(
                    env('IMAGEKIT_PUBLIC_KEY'),
                    env('IMAGEKIT_PRIVATE_KEY'),
                    env('IMAGEKIT_URL_ENDPOINT')
                );

                $file = $request->file('profile_picture');

                // Create a consistent filename for the company
                $fileName = 'company_profile_' . $company->id;
                $folderPath = '/next-step/companies/company_profile/';

                // Upload to ImageKit with overwrite enabled
                $uploadFile = $imageKit->uploadFile([
                    'file' => fopen($file->getRealPath(), 'r'),
                    'fileName' => $fileName,
                    'folder' => $folderPath,
                    'useUniqueFileName' => false, // Keep same filename
                    'overwriteFile' => true,      // Replace existing file
                    'overwriteAITags' => true,
                    'overwriteTags' => true,
                    'overwriteCustomMetadata' => true
                ]);

                if ($uploadFile && isset($uploadFile->result)) {
                    // Get the file ID from upload response
                    $fileId = $uploadFile->result->fileId;

                    // Fetch complete file details to get URL with updatedAt parameter
                    $fileDetails = $imageKit->getFileDetails($fileId);

                    if ($fileDetails && isset($fileDetails->result)) {
                        $data['profile_picture'] = $fileDetails->result->url;
                    }
                } else {
                    return redirect()->back()->with('error', 'Failed to upload profile picture')->withInput();
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Profile picture update failed: ' . $e->getMessage())->withInput();
            }
        }

        $company->update($data);

        return redirect()->back()->with('success', 'Company updated successfully!');
    }

    public function destroyCompany(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->back()->with('success', 'Company deleted successfully!');
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
        $user = User::findOrFail($id);

        // Validate based on user role
        if ($user->role === 'student') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'max:20'],
                'study_program' => ['required', 'in:informatics_engineering,business_information_systems'],
                'semester' => ['required', 'integer', 'min:1', 'max:8'],
            ]);

            // Update user information
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            // Update student information
            $student = $user->student;
            if ($student) {
                $studyProgramName = $request->study_program === 'informatics_engineering'
                    ? 'Informatics Engineering'
                    : 'Business Information Systems';

                $student->update([
                    'study_program' => $studyProgramName,
                    'semester' => $request->semester,
                ]);
            }

            return redirect()->route('user.management')->with('success', 'Student updated successfully');
        } elseif ($user->role === 'supervisor') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'max:20'],
                'department' => ['nullable', 'string', 'max:255'],
                'specialization' => ['nullable', 'string', 'max:255'],
                'research_interests' => ['nullable', 'string'],
            ]);

            // Update user information
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            // Update supervisor information
            $supervisor = $user->supervisor;
            if ($supervisor) {
                $supervisor->update([
                    'department' => $request->department,
                    'specialization' => $request->specialization,
                    'research_interests' => $request->research_interests,
                ]);
            }

            return redirect()->route('user.management')->with('success', 'Supervisor updated successfully');
        } elseif ($user->role === 'admin') {
            // Admin can only update basic user information
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'max:20'],
            ]);

            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            return redirect()->route('user.management')->with('success', 'Admin updated successfully');
        }

        // Handle other user roles if needed
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.management')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($roleModel = $this->getRoleModel($user->role)) {
            $roleModel::where('user_id', $user->id)->delete();
        }

        $user->delete();

        return redirect()->route('user.management')->with('success', 'User deleted successfully');
    }

    /**
     * Get the appropriate model class based on user role
     */
    private function getRoleModel(string $role): ?string
    {
        $roleModelMap = [
            'student' => Student::class,
            'supervisor' => Supervisors::class,
            'admin' => null, // Admin users don't have additional model
        ];

        return $roleModelMap[$role] ?? null;
    }
}
