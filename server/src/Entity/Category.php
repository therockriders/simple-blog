<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbEntries;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbMedia;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbEntries(): ?int
    {
        return $this->nbEntries;
    }

    public function setNbEntries(int $nbEntries): self
    {
        $this->nbEntries = $nbEntries;

        return $this;
    }

    public function getNbMedia(): ?int
    {
        return $this->nbMedia;
    }

    public function setNbMedia(int $nbMedia): self
    {
        $this->nbMedia = $nbMedia;

        return $this;
    }

}
