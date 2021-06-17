<?php

declare(strict_types=1);

namespace Auth\Entity\User;


use Webmozart\Assert\Assert;

final class Role
{
    public const STUDENT = 'student';
    public const MODERATOR = 'moderator';
    public const ADMIN = 'admin';
    public const PROJECT_CREATOR = 'project_creator';

    private string $name;

    public function __construct(string $name)
    {
        Assert::oneOf($name,[
            self::ADMIN,
            self::MODERATOR,
            self::PROJECT_CREATOR,
            self::STUDENT
        ]);

        $this->name = $name;
    }

    public static function student(): self
    {
        return new self(self::STUDENT);
    }

    public function getName(): string
    {
        return $this->name;
    }
}