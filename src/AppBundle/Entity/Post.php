<?php

namespace AppBundle\Entity;

use AuthenticationBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Entity
 * @ORM\Table(name="post")
 *
 * Class Post
 * @package AppBundle\Entity
 */
class Post
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     *
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="AuthenticationBundle\Entity\User", inversedBy="posts")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=150, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updated_at;

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }


}