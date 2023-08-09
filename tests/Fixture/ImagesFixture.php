<?php

declare(strict_types=1);
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesFixture.
 */
class ImagesFixture extends TestFixture
{
    /**
     * Init method.
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'left' => 1,
                'top' => 1,
                'width' => 1,
                'height' => 1,
            ],
        ];
        parent::init();
    }
}
