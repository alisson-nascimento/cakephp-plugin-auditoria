<?php
namespace Auditoria\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuditoriaRegistro Entity
 *
 * @property int $id
 * @property string $modelo_table
 * @property int $modelo_pk
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property int $created_by
 * @property int $updated_by
 *
 * @property \Auditoria\Model\Entity\AuditoriaLog[] $auditoria_logs
 */
class AuditoriaRegistro extends Entity
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
        'modelo_table' => true,
        'modelo_pk' => true,
        'created' => true,
        'deleted' => true,
        'created_by' => true,
        'updated_by' => true,
        'auditoria_logs' => true
    ];
}
