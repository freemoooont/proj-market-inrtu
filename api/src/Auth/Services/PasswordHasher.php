<?php

declare(strict_types=1);
namespace Auth\Services;


use RuntimeException;
use Webmozart\Assert\Assert;

class PasswordHasher
{
    private int $memoryCost;

    public function __construct(int $memoryCost)
    {
        $this->memoryCost = $memoryCost;
    }

    public function hash(string $password): string
    {
        Assert::notEmpty($password);
        $hash = password_hash($password,PASSWORD_ARGON2I, ['memory_cost' => $this->memoryCost]);
        if($hash === null) {
            throw new RuntimeException('Unable to generate hash.');
        }

        return $hash;
    }

    public function validate(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }


}