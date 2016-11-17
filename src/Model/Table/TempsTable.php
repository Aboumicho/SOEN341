<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Temps Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Temp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Temp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Temp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Temp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Temp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Temp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Temp findOrCreate($search, callable $callback = null)
 */
class TempsTable extends Table
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

        $this->table('temps');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('day', 'create')
            ->notEmpty('day');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->time('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->time('end')
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'));

        return $rules;
    }
}
