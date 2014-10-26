<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CommentsController extends AppController {


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

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
    public function add($post_id = null) {
        if ($this->request->is('post')) {
            $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
            $this->Comment->set(array('post_id'=>$post_id));
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash('Your comment has been added.');
                //$this->redirect(array('action' => 'index'));
                $this->redirect(array('controller' => 'posts', 'action' => 'view', $post_id));
            } else {
                $this->Session->setFlash('Unable to add your comment.');
            }
        }
    }
}