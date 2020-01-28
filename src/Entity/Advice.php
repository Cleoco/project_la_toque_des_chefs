<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdviceRepository")
 */
class Advice
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="advice", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $imgTop;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="advices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mycategory;

    public function __construct()
    {
        $now = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->setCreatedAt($now);
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAdvice($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getAdvice() === $this) {
                $comment->setAdvice(null);
            }
        }

        return $this;
    }

    public function getImgTop(): ?string
    {
        return $this->imgTop;
    }

    public function setImgTop(?string $imgTop): self
    {
        $this->imgTop = $imgTop;

        return $this;
    }

    public function getMycategory(): ?Category
    {
        return $this->mycategory;
    }

    public function setMycategory(?Category $mycategory): self
    {
        $this->mycategory = $mycategory;

        return $this;
    }
}
