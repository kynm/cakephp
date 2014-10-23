<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  //public $components = array('RequestHandler', 'Session', 'Auth');
  public $components = array(
    'Session',
    'Auth' => array(
        'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
        'logoutRedirect' => array(
            'controller' => 'users',
            'action' => 'login',
            'home'
        ),
        //'authorize' => array('Controller') // Added this line
    )
);
	public function beforeFilter() {
	    App::import('Vendor', 'facebook/src/facebook');
	    require_once(APP . 'Vendor' . DS . 'facebook' .  DS . 'src' . DS . 'Facebook' . DS . 'Facebook.php'); 
	    $this->Facebook = new Facebook(array(
	        'appId'     =>  '1493302597607739',
	        'secret'    =>  '81cb6b21693127583182dcd929bb5389'

	    ));

	    $this->Auth->allow('index', 'view');
	}
public function beforeRender() {
    $this->set('fb_login_url', $this->Facebook->getLoginUrl(array('redirect_uri' => Router::url(array('controller' => 'users', 'action' => 'login'), true))));
    $this->set('user', $this->Auth->user());
}
}

