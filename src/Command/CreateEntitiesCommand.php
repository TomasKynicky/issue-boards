<?php declare(strict_types = 1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tomaskynicky\EntityCreator\DTO\EntityDTO;
use Tomaskynicky\EntityCreator\DTO\FieldsDTO;
use Tomaskynicky\EntityCreator\Enum\DataType;
use Tomaskynicky\EntityCreator\IndexEntityCreator;

#[AsCommand(name: 'app:create-entities')]
class CreateEntitiesCommand extends Command
{

	protected function configure(): void
	{
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$arrayData = [
		];

		$indexEntityCreator = new IndexEntityCreator();
		$indexEntityCreator->index($arrayData);

		$output->writeln("Success!");

		return Command::SUCCESS;
	}
}