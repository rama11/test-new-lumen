<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testExample2()
    {
        $this->get('/version2');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testExample3()
    {
        $this->get('/version3');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testExample4()
    {
        $this->get('/version4');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}
