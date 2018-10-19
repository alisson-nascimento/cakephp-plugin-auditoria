<?php
namespace Auditoria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuditoriaLogs Model
 *
 * @property \Auditoria\Model\Table\AuditoriaRegistrosTable|\Cake\ORM\Association\BelongsTo $AuditoriaRegistros
 *
 * @method \Auditoria\Model\Entity\AuditoriaLog get($primaryKey, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog newEntity($data = null, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog[] newEntities(array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog[] patchEntities($entities, array $data, array $options = [])
 * @method \Auditoria\Model\Entity\AuditoriaLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuditoriaLogsTable extends Table
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

        $this->setTable('auditoria_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AuditoriaRegistros', [
            'foreignKey' => 'auditoria_registro_id',
            'joinType' => 'INNER',
            'className' => 'Auditoria.AuditoriaRegistros'
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
            ->scalar('tipo_acao')
            ->maxLength('tipo_acao', 20)
            ->requirePresence('tipo_acao', 'create')
            ->notEmpty('tipo_acao');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->scalar('dados_antigos')
            ->allowEmpty('dados_antigos');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['auditoria_registro_id'], 'AuditoriaRegistros'));

        return $rules;
    }
}
