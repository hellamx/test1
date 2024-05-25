<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;

class AvailabilityService
{
    public function checkDb(): bool
    {
        try {
            DB::connection()->getPdo();

            return true;
        } catch (Exception $e) {
            Log::error('Db connection is failed', (array) $e->getMessage());

            return false;
        }
    }
}
