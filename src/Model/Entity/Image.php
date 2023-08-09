<?php

declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity.
 *
 * @property int    $id
 * @property string $name
 * @property int    $left
 * @property int    $top
 * @property int    $width
 * @property int    $height
 */
class Image extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'x_axis' => true,
        'y_axis' => true,
        'width' => true,
        'height' => true,
    ];
}
