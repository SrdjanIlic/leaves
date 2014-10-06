<?php
App::uses('AppController', 'Controller');
/**
 * LeaveTypes Controller
 *
 * @property LeaveType $LeaveType
 * @property PaginatorComponent $Paginator
 */
class LeaveTypesController extends AppController {

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
		$this->LeaveType->recursive = 0;
		$this->set('leaveTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeaveType->exists($id)) {
			throw new NotFoundException(__('Invalid leave type'));
		}
        $leaveType = $this->LeaveType->get_leave_type($id);
//        debug($leaveType);
		$this->set('leaveType', $leaveType);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ($this->LeaveType->save_leave_type($this->request->data)) {
				$this->Session->setFlash(__('The leave type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LeaveType->exists($id)) {
			throw new NotFoundException(__('Invalid leave type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeaveType->save($this->request->data)) {
				$this->Session->setFlash(__('The leave type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeaveType.' . $this->LeaveType->primaryKey => $id));
			$this->request->data = $this->LeaveType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LeaveType->id = $id;
		if (!$this->LeaveType->exists()) {
			throw new NotFoundException(__('Invalid leave type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeaveType->delete()) {
			$this->Session->setFlash(__('The leave type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
