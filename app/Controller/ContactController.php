<?php

/**
 * Contact Controller
 * @author James Fairhurst <info@jamesfairhurst.co.uk>
 */
class ContactController extends AppController {

	/**
	 * Components
	 */
	public $components = array('RequestHandler');

	/**
	 * Before Filter callback
	 */
	public function beforeFilter() {
		parent::beforeFilter();

		// Change layout for Ajax requests
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
	}

	/**
	 * Main index action
	 */
	public function index() {
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Contact->create();

			// attempt to save
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash('Your message has been submitted');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}