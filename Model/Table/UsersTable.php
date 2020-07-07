<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('user_code')
            ->maxLength('user_code', 6)
            ->requirePresence('user_code', 'create')
            ->notEmptyString('user_code')
            ->add('user_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->add('user_code', 'alphaNumeric', [         // ユーザコード: 半角英数のみ
                'rule' => function ($value, $context) {
                        return preg_match('/^[a-zA-Z0-9]+$/', $value) ? true : false;
                    },
                'message' => 'ユーザコードは半角英数字のみを入力してください。'
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password', 'alphanumericsymbols', [        // パスワード: 半角英数と一部記号のみ許容
                    'rule' => function ($value, $context) {
                        return preg_match('/^[a-zA-Z0-9\x21-\x2f\x3a-\x40\x5b-\x60\x7b-\x7e]+$/', $value) ? true : false;
                    },
                'message' => 'パスワードは英数字および一部記号のみ使用可能です。'
            ]);

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 255)
            ->requirePresence('user_name', 'create')
            ->notEmptyString('user_name');

        $validator
            ->scalar('user_kana')
            ->maxLength('user_kana', 255)
            ->allowEmptyString('user_kana')
            ->add('user_kana', 'userKana', [         // 氏名カナ: 全角カナ・スペースのみ
                    'rule' => function ($value, $context) {
                        return preg_match('/^[ァ-ヾ 　]+$/u', $value) ? true : false;
                    },
                'message' => '氏名カナは全角カタカナとスペースのみを入力してください。'
            ]);

        $validator
            ->scalar('department')
            ->maxLength('department', 255)
            ->requirePresence('department', 'create')
            ->notEmptyString('department');

        $validator
            ->date('birth_date')
            ->allowEmptyDate('birth_date');

        $validator
            ->date('join_date')
            ->requirePresence('join_date', 'create')
            ->notEmptyDate('join_date');

        $validator
            ->date('retire_date')
            ->allowEmptyDate('retire_date');

        $validator
            ->requirePresence('employment_status', 'create')
            ->notEmptyString('employment_status');

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
        $rules->add($rules->isUnique(['user_code']));

        return $rules;
    }
}
