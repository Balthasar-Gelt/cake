<?php

declare(strict_types=1);
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagesTable Test Case.
 */
class ImagesTableTest extends TestCase
{
    /**
     * Test subject.
     *
     * @var \App\Model\Table\ImagesTable
     */
    protected $Images;

    /**
     * Fixtures.
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Images',
    ];

    /**
     * Test validationDefault method.
     *
     * @uses \App\Model\Table\ImagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method.
     *
     * @uses \App\Model\Table\ImagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * setUp method.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Images') ? [] : ['className' => ImagesTable::class];
        $this->Images = $this->getTableLocator()->get('Images', $config);
    }

    /**
     * tearDown method.
     */
    protected function tearDown(): void
    {
        unset($this->Images);

        parent::tearDown();
    }
}
