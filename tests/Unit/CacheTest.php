<?php

namespace Abzudev\LaravelSpaSeo\Tests\Unit;

use Abzudev\LaravelSpaSeo\Tests\BaseTestCase;

class CacheTest extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_GET_request_clears_cache()
    {
         $this->assertTrue(true);
    }

}
