<?php

namespace Tests;

use App\Traits\MongoRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use MongoRefreshDatabase;
}
