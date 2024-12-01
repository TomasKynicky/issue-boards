<?php declare(strict_types = 1);

namespace App\Entity;

use App\Repository\IssueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IssueRepository::class)]
#[ORM\Table(name: '`issue`')]

class Issue
{
    #[ORM\Id]
       #[ORM\GeneratedValue]
       #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: IssueState::class, inversedBy: 'Issue')]
    #[ORM\JoinColumn(name: 'issueState_id', referencedColumnName: 'id', nullable: false)]
    private IssueState $issueState;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Issue')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true)]
    private ?User $user = null;

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

    public function getIssueState(): IssueState
    {
        return $this->issueState;
    }

    public function setIssueState(IssueState $issueState): static
    {
        $this->issueState = $issueState;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

}
