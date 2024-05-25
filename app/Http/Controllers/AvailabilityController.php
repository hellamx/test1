<?php

namespace App\Http\Controllers;

use App\Services\AvailabilityService;

class AvailabilityController extends Controller
{
    private AvailabilityService $service;

    public function __construct(AvailabilityService $service)
    {
        $this->service = $service;
    }

    public function checkDb(): void
    {
        echo $this->service->checkDb() ? 'Соединение к БД установлено' : 'Соединение к БД не установлено';
    }
}
