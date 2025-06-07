<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
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
        $users = User::paginate(10);
        return view('manage', compact('user', 'users'));
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
                'major' => ['required', 'in:informatics_engineering,business_information_system'],
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
