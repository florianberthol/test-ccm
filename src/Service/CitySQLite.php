<?php

namespace App\Service;

use App\Repository\CitySQLiteRepository;

class CitySQLite implements CityInterface
{
    public function __construct(private CitySQLiteRepository $citySQLiteRepository)
    {}

    public function fetchByDepartmentId(int $departmentId): array
    {
        return $this->citySQLiteRepository->findCitiesByDepartmentId($departmentId);
    }

}