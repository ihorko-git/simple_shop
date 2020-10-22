<?php
namespace Resultify\SimpleShop\Domain\Model;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use \TYPO3\CMS\Extbase\Domain\Model\FileReference;

class Product extends AbstractEntity
{
    protected $uid = 0;

    protected $name = '';

    protected $description = '';

    /**
     * images to use in the gallery
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = null;

    protected $price = 0;

    public function __construct(int $uid = 0, string $name = '', string $description = '', float $price = 0)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->images = new ObjectStorage();
    }

    public function setUid(int $uid): void
    {
        $this->uid = $uid;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the image value
     *
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    /**
     * @return ObjectStorage<FileReference>
     */
    public function getImages()
    {
        return $this->images;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}