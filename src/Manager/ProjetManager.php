<?php

namespace App\Manager;

use App\Contract\Manager\ProjetManagerInterface;
use App\Entity\Membre;
use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

class ProjetManager implements ProjetManagerInterface
{
    /**
     * @var ProjetRepository $repository
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
        $repo = $entityManager->getRepository(Projet::class);
        if (!$repo instanceof ProjetRepository) {
            throw new InvalidArgumentException(sprintf(
                'The repository class for "%s" must be "%s" and given "%s"! ' .
                'Maybe look the "repositoryClass" declaration on %s ?',
                Projet::class,
                ProjetRepository::class,
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