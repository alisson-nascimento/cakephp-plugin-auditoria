<?php
namespace Auditoria\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuditoriaLog Entity
 *
 * @property int $id
 * @property int $auditoria_registro_id
 * @property string $tipo_acao
 * @property \Cake\I18n\FrozenTime $created
 * @property int $created_by
 * @property string $dados_antigos
 *
 * @property \Auditoria\Model\Entity\AuditoriaRegistro $auditoria_registro
 */
class AuditoriaLog extends Entity
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
        'auditoria_registro_id' => true,
        'tipo_acao' => true,
        'created' => true,
        'created_by' => true,
        'dados_antigos' => true,
        'auditoria_registro' => true
    ];
}
