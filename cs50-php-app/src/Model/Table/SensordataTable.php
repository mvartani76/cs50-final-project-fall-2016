<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sensordata Model
 *
 * @method \App\Model\Entity\Sensordata get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sensordata newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sensordata[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sensordata|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sensordata patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sensordata[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sensordata findOrCreate($search, callable $callback = null)
 */
class SensordataTable extends Table
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

        $this->table('sensordata');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->float('temp1')
            ->requirePresence('temp1', 'create')
            ->notEmpty('temp1');

        $validator
            ->integer('photo1')
            ->requirePresence('photo1', 'create')
            ->notEmpty('photo1');

        $validator
            ->requirePresence('DeviceType', 'create')
            ->notEmpty('DeviceType');

        return $validator;
    }
}
