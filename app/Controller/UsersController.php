	<?php

	class UsersController extends AppController
	{
	public $uses = array('Comment', 'Post', 'Relationship', 'User');
	public $helpers = array('Html', 'Form', 'Youtube', 'Paginator');
	public function beforeFilter()
	{
	parent::beforeFilter();
	$this->Auth->allow('register', 'login','logout');
	}

	public function view($id = null) {
        $this->User->id = $id;
        $viewUser = $this->User->read();
        //die(var_dump($viewUser));
        $followings = $viewUser['FollowingUsers'];

        $followings_id = array();
        foreach ($followings as $following) {
            $followings_id[] = $following['followed_id'];
        }
        $followingUsers = $this->User->find('all', array('conditions' => array('id' => $followings_id)));

        $followers = $viewUser['Followers'];

        $followers_id = array();
        foreach ($followers as $follower) {
            $followers_id[] = $follower['followed_id'];
        }
        $followerUsers = $this->User->find('all', array('conditions' => array('id' => $followers_id)));
        $this->set('followerUsers', $followerUsers);
        $this->set('followingUsers', $followingUsers);
		$this->set('viewUser', $viewUser);
	}

	public function login()
	{
	if ($this->request->is('post')) {
	    if ($this->Auth->login()) {
	      //  $this->Session->setFlash(__('Invalid username or password, try again'),'notifications/alert', array('class' => 'alert-success' ));
	        $this->redirect($this->Auth->redirect());
	    } else {
	        $this->Session->setFlash(__('Invalid username or password, try again'),'notifications/alert', array('class' => 'alert-error' ));
	    }
	}
	}

	public function logout()
	{
	$this->redirect($this->Auth->logout());
	}

	public function register() 
	{
	if ($this->request->is('post')) 
	{
	  $this->User->create();
	  if ($this->User->save($this->request->data)) {
	      $this->Session->setFlash(__('Registration successful. Please login'),'notifications/alert', array('class' => 'alert-success' ));
	      $this->redirect(array('action' => 'login'));
	  } else {
	      $this->Session->setFlash(__('The user could not be saved. Please, try again.'),'notifications/alert', array('class' => 'alert-error' ));
	      unset($this->request->data['User']['password']);
	      unset($this->request->data['User']['password_validate']);
	  }
	}
	}

	}

	?>
