<?php

namespace App\Entity;

use App\Repository\EntryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntryRepository::class)
 */
class Entry
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
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $coverPath;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $coverWwwPath;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbMedia;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pubDate;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class)
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

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

    public function getCoverPath(): ?string
    {
        return $this->coverPath;
    }

    public function setCoverPath(string $coverPath): self
    {
        $this->coverPath = $coverPath;

        return $this;
    }

    public function getCoverWwwPath(): ?string
    {
        return $this->coverWwwPath;
    }

    public function setCoverWwwPath(?string $coverWwwPath): self
    {
        $this->coverWwwPath = $coverWwwPath;

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

    public function getPubDate(): ?\DateTimeInterface
    {
        return $this->pubDate;
    }

    public function setPubDate(\DateTimeInterface $pubDate): self
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

}
