<?php

declare(strict_types=1);

namespace Modules\Doctrine\Src\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait DatesColumnsTrait
{
    /**
     * @var DateTime $createdAt
     *
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    private DateTime $updatedAt;

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }
}
