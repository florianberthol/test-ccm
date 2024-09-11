<?php

namespace App\Command;

use App\Repository\CityRepository;
use App\Repository\CitySQLiteRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:update-db',
    description: 'Load the cities into sqlite from the csv.'
)]
class UpdateDatabaseFromCSVCommand extends Command
{
    public function __construct(protected CityRepository $sourceRepository, protected CitySQLiteRepository $destRepository)
    {
        parent::__construct();
    }

    protected function configure(): void
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

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->destRepository->createTable();
        if ($input->getOption('truncate')) {
            $this->destRepository->truncate();
        }

        $this->destRepository->saveCities($this->sourceRepository->getAll());

        return 0;
    }

}