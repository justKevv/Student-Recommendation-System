<?php

namespace App\Services;

use App\Models\Student;

class NimGeneratorService
{
    public static function generate(int $semester, string $major): string
    {
        // Generate NIM
        $currentYear = date('y'); // Get last two digits of the current year e.g., 25 for 2025
        
        if ($semester % 2 != 0) {
            $semester++; // Make it even if odd
        }
        $yearOffset = $semester / 2;
        $nimYear = $currentYear - $yearOffset;
        
        if ($nimYear < 0) {
            $nimYear = '00';
        } else {
            $nimYear = str_pad($nimYear, 2, '0', STR_PAD_LEFT);
        }

        $hardcodedPart = '41';
        $majorCode = ($major == 'informatics_engineering') ? '72' : '76';
        $baseNIM = $nimYear . $hardcodedPart . $majorCode;

        // Find the latest NIM with the same base
        $latestStudentWithSameBase = Student::where('nim', 'like', $baseNIM . '%')
            ->orderBy('nim', 'desc')
            ->first();

        $sequentialNumber = 1;
        if ($latestStudentWithSameBase) {
            $lastFourDigits = substr($latestStudentWithSameBase->nim, -4);
            $sequentialNumber = intval($lastFourDigits) + 1;
        }
        
        return $baseNIM . str_pad($sequentialNumber, 4, '0', STR_PAD_LEFT);
    }
}