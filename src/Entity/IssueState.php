<?php declare(strict_types = 1);

namespace App\Entity;

use App\Repository\IssueStateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IssueStateRepository::class)]
#[ORM\Table(name: '`issuestate`')]

class IssueState
{
    #[ORM\Id]
       #[ORM\GeneratedValue]
       #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

}
