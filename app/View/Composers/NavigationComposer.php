<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class NavigationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = app('current.user');

        $internshipNavigation = [
            'href' => $this->getInternshipHref($user->role),
            'isActive' => $this->isInternshipActive($user->role)
        ];

        $userManagementNavigation = $this->getUserManagementNavigation($user);

        $view->with([
            'internshipNavigation' => $internshipNavigation,
            'userManagementNavigation' => $userManagementNavigation
        ]);
    }

    /**
     * Get the internship href based on user role.
     *
     * @param  string  $role
     * @return string
     */
    private function getInternshipHref(string $role): string
    {
        return match($role) {
            'student' => route('internship'),
            'admin' => route('internship.management'),
            default => route('company')
        };
    }

    /**
     * Check if internship navigation is active based on user role.
     *
     * @param  string  $role
     * @return bool
     */
    private function isInternshipActive(string $role): bool
    {
        return match($role) {
            'student' => Route::currentRouteName() == 'internship',
            'admin' => Route::currentRouteName() == 'internship.management',
            default => Route::currentRouteName() == 'company'
        };
    }

    /**
     * Get user management navigation data.
     *
     * @param  \App\Models\User  $user
     * @return array|null
     */
    private function getUserManagementNavigation($user): ?array
    {
        if ($user->role === 'supervisor') {
            return null;
        }

        return [
            'href' => $this->getUserManagementHref($user->role),
            'isActive' => $this->isUserManagementActive($user->role),
            'useFill' => $user->role === 'admin',
            'useStroke' => $user->role !== 'admin',
            'icon' => $user->role === 'student' ? 'icons.history' : 'icons.user'
        ];
    }

    /**
     * Get the user management href based on user role.
     *
     * @param  string  $role
     * @return string
     */
    private function getUserManagementHref(string $role): string
    {
        return $role === 'student' ? route('history') : route('user.management');
    }

    /**
     * Check if user management navigation is active based on user role.
     *
     * @param  string  $role
     * @return bool
     */
    private function isUserManagementActive(string $role): bool
    {
        $currentRoute = Route::currentRouteName();
        return $currentRoute === 'history' || $currentRoute === 'user.management';
    }
}
