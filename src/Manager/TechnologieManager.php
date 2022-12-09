<?php

namespace App\Manager;

use App\Contract\Manager\TechnologieManagerInterface;
use App\Entity\Technologie;
use App\Repository\TechnologieRepository;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

class TechnologieManager implements TechnologieManagerInterface
{
    /**
     * @var TechnologieRepository $repository
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
        $repo = $entityManager->getRepository(Technologie::class);
        if (!$repo instanceof TechnologieRepository) {
            throw new InvalidArgumentException(sprintf(
                'The repository class for "%s" must be "%s" and given "%s"! ' .
                'Maybe look the "repositoryClass" declaration on %s ?',
                Technologie::class,
                TechnologieRepository::class,
                get_class($repo),
                Technologie::class
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