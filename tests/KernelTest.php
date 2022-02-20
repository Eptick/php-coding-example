<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\{Kernel, HttpApplication};

final class KernelTest extends TestCase
{
    public function testKernelBootsUp(): void
    {
        $this->assertInstanceOf(
            Kernel::class,
            new Kernel(new HttpApplication())
        );
    }
}
