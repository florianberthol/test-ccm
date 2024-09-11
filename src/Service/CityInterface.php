<?php

namespace App\Service;

interface CityInterface
{
    public function fetchByDepartmentId(int $departmentId): array;
}