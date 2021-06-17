<?php

declare(strict_types=1);
namespace Auth\Services;


use Auth\Entity\User\Token;
use Ramsey\Uuid\Uuid;

class Tokenizer
{
    private \DateInterval $interval;

    public function __construct(\DateInterval $interval)
    {
        $this->interval = $interval;
    }

    public function generate(\DateTimeImmutable $date): Token
    {
        return new Token(
            Uuid::uuid4()->toString(),
            $date->add($this->interval)
        );
    }

}