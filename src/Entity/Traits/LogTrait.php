<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait LogTrait
{
    /**
     * @ORM\Column(type="datetime", length=255, nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", length=255, nullable=true)
     */
    private $updated_at;


    public function getCreatedAd(): ?datetime
    {
        return $this->created_at;
    }

    public function setCreatedAt(datetime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAd(): ?datetime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(datetime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}