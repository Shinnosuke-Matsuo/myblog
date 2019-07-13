<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTagsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts',[
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Tags',[
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        return $validator;
    }
}
