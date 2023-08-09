<?php

declare(strict_types=1);
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ImagesController Test Case.
 *
 * @uses \App\Controller\ImagesController
 */
class ImagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures.
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Images',
    ];

    /**
     * Test index method.
     *
     * @uses \App\Controller\ImagesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method.
     *
     * @uses \App\Controller\ImagesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method.
     *
     * @uses \App\Controller\ImagesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method.
     *
     * @uses \App\Controller\ImagesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method.
     *
     * @uses \App\Controller\ImagesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
