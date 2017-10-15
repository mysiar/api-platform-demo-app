<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 15/10/2017 18:56
 */

namespace Mysiar\FileBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Document
 * @ORM\Entity()
 * @ORM\Table(name="files")
 * @Vich\Uploadable
 */
class Document
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Vich\UploadableField(
     *     mapping="file",
     *     fileNameProperty="name",
     *     size="size",
     *     mimeType="mimeType",
     *     originalName="originalName"
     *
     * )
     * @Assert\NotBlank()
     * @var File
     */
    private $file;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="original_name", type="string", length=255)
     *
     * @var string
     */
    private $originalName;

    /**
     * @ORM\Column(name="size", type="integer")
     *
     * @var int
     */
    private $size;

    /**
     * @ORM\Column(name="mime_type", type="string", length=255)
     *
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setCreatedAt(DateTime $createdAt): Document
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file = null): Document
    {
        $this->file = $file;
        if($file) {
            $this->createdAt = new DateTime();
        }
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Document
    {
        $this->name = $name;
        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): Document
    {
        $this->originalName = $originalName;
        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): Document
    {
        $this->size = $size;
        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(?string $mimeType): Document
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Document
    {
        $this->description = $description;
        return $this;
    }
}
