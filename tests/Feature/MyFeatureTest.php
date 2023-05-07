<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MyFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function testSomething()
    {
        try {
            // This will use the main database connection
            $result = DB::table('users')->all();
            $this->assertTrue($result->count() > 0);
        } catch (\Exception $e) {
            // If there's an error, switch to the fallback database connection
            Config::set('database.default', 'fallback');

            // This will use the fallback database connection
            $result = DB::table('users')->all();
            $this->assertTrue($result->count() > 0);

            // Switch back to the main database connection
            Config::set('database.default', 'mysql');
        }
    }
}
