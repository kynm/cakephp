<?php
App::uses('AppController', 'Controller');
class RelationshipsController extends AppController {
/**
 * Default helper
 *
 * @var array
 */
    public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array();


    public function follow($following_id = null) {
        $this->Relationship->create();
        $this->Relationship->set('user_id',$this->Auth->User('id'));
        $this->Relationship->set('followed_id',$following_id);
        if ($this->Relationship->save($this->data)) {
            // all good
        } else {
            // You could throw an error here if you want
            $this->Session->setFlash(__('Error. Please, try again.', true));
        }
        $this->redirect($this->referer());
    }
    public function unFollow($user_id, $following_id) {
        if ($this->Relationship->deleteAll(array('Relationship.user_id' => $user_id, 'followed_id' => $following_id), true)) {
            // all good
        } else {
            // You could throw an error here if you want
            $this->Session->setFlash(__('Error. Please, try again.', true));
        }
        $this->redirect($this->referer());
    }
}