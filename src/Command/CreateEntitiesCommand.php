<?php declare(strict_types = 1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tomaskynicky\EntityCreator\DTO\EntityDTO;
use Tomaskynicky\EntityCreator\DTO\FieldsDTO;
use Tomaskynicky\EntityCreator\Enum\DataType;
use Tomaskynicky\EntityCreator\Enum\RelationType;
use Tomaskynicky\EntityCreator\IndexEntityCreator;

#[AsCommand(name: 'app:create-entities')]
class CreateEntitiesCommand extends Command
{
	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$arrayData = [
			new EntityDTO(
				name: "Issue",
				fields: [
					new FieldsDTO(
						name: 'id',
						type: DataType::ID,
					),
					new FieldsDTO(
						name: 'name',
						type: DataType::STRING,
						length: '255',
						nullable: false
					),
					new FieldsDTO(
						name: 'issueState',
						type: DataType::RELATION,
						length: '255',
						relationTo: "IssueState",
						relation: RelationType::MANY_TO_ONE,
						nullable: false
					),
					new FieldsDTO(
						name: 'user',
						type: DataType::RELATION,
						length: '255',
						relationTo: "User",
						relation: RelationType::MANY_TO_ONE,
						nullable: true
					)
				]
			),
			new EntityDTO(
				name: 'IssueState',
				fields: [
					new FieldsDTO(
						name: 'id',
						type: DataType::ID,
					),
					new FieldsDTO(
						name: 'name',
						type: DataType::STRING,
						length: '255',
						nullable: false
					),
				]
			),
		];

		$indexEntityCreator = new IndexEntityCreator();
		$indexEntityCreator->index($arrayData);
		$output->writeln("Success!");
		return Command::SUCCESS;
	}
}
