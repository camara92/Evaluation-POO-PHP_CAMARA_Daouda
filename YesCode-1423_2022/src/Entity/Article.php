<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Désolé au moins {{ limit }} characteres requis',
        maxMessage: 'Oh ! pas plus que {{ limit }} caracteres Michel !',
    )]
    private $title;

    #[Assert\Length(
        min: 15,
        max: 255,
        minMessage: 'Désolé au moins {{ limit }} characteres requis',
        maxMessage: 'Maximum {{ limit }} caracteres Michel !',
    )]
    #[ORM\Column(type: 'string', length: 255)]
    private $intro;

    #[Assert\NotBlank(message:"Ce champs ne peut pas etre vide")]
    #[ORM\Column(type: 'text')]
    private $content;

    #[Assert\Url(message:"Ceci n'est pas un URL")]
    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $author;

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

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): self
    {
        $this->intro = $intro;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function initSlug(){

        if (empty($this->slug)) {
            $slug = new Slugify();
            $this->slug = $slug->slugify($this->getTitle() . time() . hash('sha256', $this->getIntro()));
        }

    }

    #[ORM\PrePersist]
    public function updateDate(){
        if (empty($this->createdAt)) {
           $this->createdAt = new \DateTime();
        }
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
