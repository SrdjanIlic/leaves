<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property Rule $Rule
 * @property PaginatorComponent $Paginator
 */
class RulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rule->recursive = 0;
		$this->set('rules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Rule->exists($id)) {
			throw new NotFoundException(__('Invalid rule'));
		}
		$options = array('conditions' => array('Rule.' . $this->Rule->primaryKey => $id));
		$this->set('rule', $this->Rule->find('first', $options));
	}

}
