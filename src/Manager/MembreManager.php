<?php

namespace App\Manager;

use App\Contract\Manager\MembreManagerInterface;
use App\Entity\Membre;
use App\Repository\MembreRepository;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

class MembreManager implements MembreManagerInterface
{
    /**
     * @var MembreRepository $repository
     */
    private $repository;

    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $repo = $entityManager->getRepository(Membre::class);
        if (!$repo instanceof MembreRepository) {
            throw new InvalidArgumentException(sprintf(
                'The repository class for "%s" must be "%s" and given "%s"! ' .
                'Maybe look the "repositoryClass" declaration on %s ?',
                Membre::class,
                MembreRepository::class,
                get_class($repo),
                Membre::class
            ));
        }
        $this->repository = $repo;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}