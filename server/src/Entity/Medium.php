<?php

namespace App\Entity;

use App\Repository\MediumRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediumRepository::class)
 */
class Medium
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
     * @ORM\Column(type="string", length=1000)
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ext;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $wwwPath;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $thumbPath;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $wwwThumbPath;

    /**
     * @ORM\OneToOne(targetEntity=Entry::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $entry;

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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getExt(): ?string
    {
        return $this->ext;
    }

    public function setExt(string $ext): self
    {
        $this->ext = $ext;

        return $this;
    }

    public function getWwwPath(): ?string
    {
        return $this->wwwPath;
    }

    public function setWwwPath(string $wwwPath): self
    {
        $this->wwwPath = $wwwPath;

        return $this;
    }

    public function getThumbPath(): ?string
    {
        return $this->thumbPath;
    }

    public function setThumbPath(?string $thumbPath): self
    {
        $this->thumbPath = $thumbPath;

        return $this;
    }

    public function getWwwThumbPath(): ?string
    {
        return $this->wwwThumbPath;
    }

    public function setWwwThumbPath(?string $wwwThumbPath): self
    {
        $this->wwwThumbPath = $wwwThumbPath;

        return $this;
    }

    public function getEntry(): ?Entry
    {
        return $this->entry;
    }

    public function setEntry(Entry $entry): self
    {
        $this->entry = $entry;

        return $this;
    }
}
