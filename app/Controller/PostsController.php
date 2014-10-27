<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Youtube', 'Paginator');
    public $components = array('Paginator');
    public $uses = array('Comment', 'Post', 'Relationship');

    public $paginate = array(
        'Post' => array('limit' => 4,
            'order' => array(
                'Post.title' => 'asc'
            )
        ),
    );

    public function index() {
        $this->Paginator->settings = array(
            'limit' => 4
        );
        $data = $this->Paginator->paginate('Post');
        $this->set('posts', $data);
    }
    public function user_posts() {
        $this->Paginator->settings = array(
            'conditions' =>array('user_id' => $this->Auth->user('id')),
            'limit' => 4,
        );
        $data = $this->Paginator->paginate('Post');
        $this->set('posts', $data);
    }

    public function view($id = null) {
        $user = $this->Auth->user();
        $Relationship = $this->Relationship;
        $this->Post->id = $id;
        $post = $this->Post->read();
        $this->Paginator->settings = array(
            'conditions' =>array('post_id' => $id),
            'limit' => 2,
        );
        $comments = $this->Paginator->paginate('Comment');
        $this->set('post', $post);
        $this->set('comments', $comments);
        $this->set('user_id', $user['id']);
        $this->set('Relationship', $Relationship);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->set('errors', $this->Post->validationErrors);
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }

    public function edit($id = null) {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
}