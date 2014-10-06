<?php
App::uses('AppController', 'Controller');
/**
 * LeaveRules Controller
 *
 * @property LeaveRule $LeaveRule
 * @property PaginatorComponent $Paginator
 */
class LeaveRulesController extends AppController {

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
		$this->LeaveRule->recursive = 0;
		$this->set('leaveRules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeaveRule->exists($id)) {
			throw new NotFoundException(__('Invalid leave rule'));
		}
		$options = array('conditions' => array('LeaveRule.' . $this->LeaveRule->primaryKey => $id));
		$this->set('leaveRule', $this->LeaveRule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeaveRule->create();
			if ($this->LeaveRule->save($this->request->data)) {
				$this->Session->setFlash(__('The leave rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave rule could not be saved. Please, try again.'));
			}
		}
		$leaveTypes = $this->LeaveRule->LeaveType->find('list');
		$rules = $this->LeaveRule->Rule->find('list');
		$this->set(compact('leaveTypes', 'rules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LeaveRule->exists($id)) {
			throw new NotFoundException(__('Invalid leave rule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeaveRule->save($this->request->data)) {
				$this->Session->setFlash(__('The leave rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave rule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeaveRule.' . $this->LeaveRule->primaryKey => $id));
			$this->request->data = $this->LeaveRule->find('first', $options);
		}
		$leaveTypes = $this->LeaveRule->LeaveType->find('list');
		$rules = $this->LeaveRule->Rule->find('list');
		$this->set(compact('leaveTypes', 'rules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LeaveRule->id = $id;
		if (!$this->LeaveRule->exists()) {
			throw new NotFoundException(__('Invalid leave rule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeaveRule->delete()) {
			$this->Session->setFlash(__('The leave rule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave rule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
