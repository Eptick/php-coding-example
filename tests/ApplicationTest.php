<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\MyApplication;

final class ApplicationTest extends TestCase
{
    public function testApplicationBootsUp(): void
    {
        $this->assertInstanceOf(
            MyApplication::class,
            new MyApplication()
        );
    }
}
