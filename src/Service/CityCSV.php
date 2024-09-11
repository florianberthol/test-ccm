<?php

namespace App\Service;

use App\Repository\CityRepository;

class CityCSV implements CityInterface
{
    public function __construct(private CityRepository $cityRepository)
    {}

    public function fetchByDepartmentId(int $departmentId): array
    {
        return $this->cityRepository->fetchByDepartmentId($departmentId);
    }
}