<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffiliateRepository")
 * @ORM\Table(name="affiliates")
 */
class Affiliate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Group[]|null
     * @ORM\OneToMany(targetEntity="App\Entity\Group", mappedBy="affiliate", cascade={"persist", "remove"})
     */
    private $groups;

    public function getId(): ?int
    {
        return $this->id;
    }
}
