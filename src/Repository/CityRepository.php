<?php

namespace App\Repository;

use App\Entity\City;

final class CityRepository
{
    /** @var ?array $data */
    private $dataByDepartmentId;

    public function __construct(string $filePath)
    {
        $this->dataByDepartmentId = [];
        $handle = fopen($filePath, 'r');
        fgetcsv($handle); // Remove header
        while (($row = fgetcsv($handle)) !== false) {
            if (array_key_exists($row[1], $this->dataByDepartmentId) === false) {
                $this->dataByDepartmentId[$row[1]] = [];
            }
            $this->dataByDepartmentId[$row[1]][] = [
                'id' => $row[0],
                'name' => $row[3]
            ];
        }
    }

    public function findByDepartmentId(int $departmentId): array
    {
        $cities = [];
        if (array_key_exists($departmentId, $this->dataByDepartmentId) === true) {
            $cities = [];
            foreach ($this->dataByDepartmentId[$departmentId] as $cityData) {
                $city = new City();
                $city->setId($cityData['id']);
                $city->setName($cityData['name']);
                $cities[] = $city;
            }
        }

        return $cities;
    }
}
