<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Klass Entity
 *
 * @property int $id
 * @property string $name
 * @property string $day
 * @property string $type
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property string $code
 * @property int $course_id
 *
 * @property \App\Model\Entity\Course $course
 */
class Klass extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
