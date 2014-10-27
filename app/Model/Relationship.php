<?php
class Relationship extends AppModel {
    public $name = 'Relationship';
    public $useTable = 'friendships';

    public $validate = array(
        'user_id' => array(
        'numeric' => array(
           'rule' => array('numeric'),
        ),
    ),
        'followed_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    public $belongsTo = array(
        'FollowedBy' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Following' => array(
            'className' => 'User',
            'foreignKey' => 'followed_id'
        )
    );
    public function isFollower($user_id, $followed_id) {
        $count = $this->find('count', array('conditions' => array('user_id' => $user_id, 'followed_id' => $followed_id)));
        return $count;
    }
}