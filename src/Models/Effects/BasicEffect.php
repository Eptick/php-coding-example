<?php

namespace App\Models\Effects;

abstract class BasicEffect implements Effect
{
    public static $affects = [];

    public function powerEffect(): int
    {
        return 0;
    }

    public function bodyCountEffect(): int
    {
        return 0;
    }

    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
