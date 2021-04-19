<?php

namespace units\App\Repository;

use App\Repository\CityRepository;
use PHPUnit\Framework\TestCase;

class CityRepositoryTest extends TestCase
{
    private CityRepository $instance;

    public function setUp(): void
    {
        $this->instance = new CityRepository(dirname(__FILE__) . '/../../../../db/cities.csv');
    }

    public function testFetchByDepartmentId()
    {
        $this->assertInstanceOf(
            CityRepository::class,
            $this->instance
        );
    }
}