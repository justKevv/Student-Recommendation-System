<?php

namespace App\Services;

use App\Models\Supervisors;

class NidnGeneratorService
{
    public static function generate(int $teachingStartYear): string
    {
        // Generate NIDN with format: 07 + 41 + YY + XXX
        // 07 - hardcoded
        // 41 - hardcoded 
        // YY - last 2 digits of teaching start year
        // XXX - sequential number (3 digits)
        
        $hardcodedPrefix = '07';
        $hardcodedMiddle = '41';
        $yearSuffix = str_pad($teachingStartYear % 100, 2, '0', STR_PAD_LEFT);
        
        $baseNIDN = $hardcodedPrefix . $hardcodedMiddle . $yearSuffix;
        
        // Find the latest NIDN with the same base
        $latestSupervisorWithSameBase = Supervisors::where('nidn', 'like', $baseNIDN . '%')
            ->orderBy('nidn', 'desc')
            ->first();
        
        $sequentialNumber = 1;
        if ($latestSupervisorWithSameBase) {
            $lastThreeDigits = substr($latestSupervisorWithSameBase->nidn, -3);
            $sequentialNumber = intval($lastThreeDigits) + 1;
        }
        
        return $baseNIDN . str_pad($sequentialNumber, 3, '0', STR_PAD_LEFT);
    }
}