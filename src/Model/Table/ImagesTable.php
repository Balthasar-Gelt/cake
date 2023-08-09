<?php

declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model.
 *
 * @method \App\Model\Entity\Image                                             newEmptyEntity()
 * @method \App\Model\Entity\Image                                             newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Image[]                                           newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image                                             get($primaryKey, $options = [])
 * @method \App\Model\Entity\Image                                             findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Image                                             patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Image[]                                           patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image|false                                       save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image                                             saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface       saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface       deleteManyOrFail(iterable $entities, $options = [])
 */
class ImagesTable extends Table
{
    /**
     * Initialize method.
     *
     * @param array $config the configuration for the Table
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('images');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator validator instance
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->regex('name', '/^(.*\.png|.*\.jpg)$/', 'Unsupported file format');

        $validator
            ->integer('x_axis')
            ->requirePresence('x_axis', 'create')
            ->notEmptyString('x_axis')
            ->nonNegativeInteger('x_axis', 'Value can not be negative');

        $validator
            ->integer('y_axis')
            ->requirePresence('y_axis', 'create')
            ->notEmptyString('y_axis')
            ->nonNegativeInteger('y_axis', 'Value can not be negative');

        $validator
            ->integer('width')
            ->requirePresence('width', 'create')
            ->notEmptyString('width')
            ->naturalNumber('width', 'Given value is too low');

        $validator
            ->integer('height')
            ->requirePresence('height', 'create')
            ->notEmptyString('height')
            ->naturalNumber('height', 'Given value is too low');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->addCreate(new IsUnique(['name']), 'nameUnique', ['errorField' => 'name', 'message' => 'Name of the file must be unique']);

        return $rules;
    }
}
