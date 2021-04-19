<?php

namespace App\Command;

use App\Repository\CityRepository;
use App\Repository\CitySQLiteRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateDatabaseFromCSVCommand extends Command
{
    protected static $defaultName = 'app:update-db';

    protected CityRepository $sourceRepository;
    protected CitySQLiteRepository $destRepository;

    protected function configure()
    {
        $this
            ->addOption('truncate', null, InputOption::VALUE_NONE)
        ;
    }

    /**
     * @param CityRepository $sourceRepository
     * @return UpdateDatabaseFromCSVCommand
     * @required
     */
    public function setSourceRepository(CityRepository $sourceRepository): UpdateDatabaseFromCSVCommand
    {
        $this->sourceRepository = $sourceRepository;
        return $this;
    }

    /**
     * @param CitySQLiteRepository $destRepository
     * @return UpdateDatabaseFromCSVCommand
     * @required
     */
    public function setDestRepository(CitySQLiteRepository $destRepository): UpdateDatabaseFromCSVCommand
    {
        $this->destRepository = $destRepository;
        return $this;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->destRepository->createTable();
        if ($input->getOption('truncate')) {
            $this->destRepository->truncate();
        }

        $this->destRepository->saveCities($this->sourceRepository->getAll());

        return 0;
    }

}