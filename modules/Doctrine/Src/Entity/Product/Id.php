<?php

declare(strict_types=1);

namespace Modules\Doctrine\Src\Entity\Product;

use Ramsey\Uuid\Uuid;

class Id
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function next(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
