<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DeviceTypes
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Device get($primaryKey, $options = [])
 * @method \App\Model\Entity\Device newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Device[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Device|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Device[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Device findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevicesTable extends Table
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

        $this->table('devices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DeviceTypes', [
            'foreignKey' => 'deviceType_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->requirePresence('deviceName', 'create')
            ->notEmpty('deviceName');

        $validator
            ->requirePresence('token', 'create')
            ->notEmpty('token')
            ->add('token', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['token']));
        $rules->add($rules->existsIn(['deviceType_id'], 'DeviceTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
