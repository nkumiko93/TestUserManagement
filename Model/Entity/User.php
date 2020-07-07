<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user_code
 * @property string $password
 * @property string $user_name
 * @property string|null $user_kana
 * @property string $department
 * @property \Cake\I18n\FrozenDate|null $birth_date
 * @property \Cake\I18n\FrozenDate $join_date
 * @property \Cake\I18n\FrozenDate|null $retire_date
 * @property int $employment_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $updated
 */
class User extends Entity
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
        'user_code' => true,
        'password' => true,
        'user_name' => true,
        'user_kana' => true,
        'department' => true,
        'birth_date' => true,
        'join_date' => true,
        'retire_date' => true,
        'employment_status' => true,
        'created' => true,
        'updated' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];


    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
