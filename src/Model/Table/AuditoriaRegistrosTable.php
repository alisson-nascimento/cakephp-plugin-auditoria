<?php
namespace Auditoria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuditoriaRegistros Model
 *
 * @property \Auditoria\Model\Table\AuditoriaLogsTable|\Cake\ORM\Association\HasMany $AuditoriaLogs
 *
 * @method \Auditoria\Model\Entity\AuditoriaRegistro get($primaryKey, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro newEntity($data = null, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro[] newEntities(array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro[] patchEntities($entities, array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaRegistro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuditoriaRegistrosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('auditoria_registros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AuditoriaLogs', [
            'foreignKey' => 'auditoria_registro_id',
            'className' => 'Auditoria.AuditoriaLogs'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('modelo_table')
            ->maxLength('modelo_table', 100)
            ->requirePresence('modelo_table', 'create')
            ->notEmpty('modelo_table');

        $validator
            ->integer('modelo_pk')
            ->requirePresence('modelo_pk', 'create')
            ->notEmpty('modelo_pk');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->integer('updated_by')
            ->allowEmpty('updated_by');

        return $validator;
    }
}
