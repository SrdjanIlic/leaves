<?php
App::uses('AppController', 'Controller');
/**
 * Leaves Controller
 *
 * @property Leave $Leave
 * @property PaginatorComponent $Paginator
 */
class LeavesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public $paginate = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Leave->recursive = 0;
        $group_id = $this->currentAccount['group_id'];
        if ($group_id == 2) {
            $leaves = $this->Paginator->paginate(array('Leave.user_id' => $this->currentAccount['id']));
        } else {
            $leaves = $this->Paginator->paginate();
        }
        $this->set(compact('leaves', 'group_id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Leave->exists($id)) {
			throw new NotFoundException(__('Invalid leave'));
		}
		$options = array('conditions' => array('Leave.' . $this->Leave->primaryKey => $id));
        $leave = $this->Leave->find('first', $options);

        $this->loadModel('LeaveType');
        $leaveType = $this->LeaveType->get_leave_type($leave['LeaveType']['id']);

        $this->set(compact('leave', 'leaveType'));
	}

    /**
     * @param null $leave_id
     * @throws NotFoundException
     */
    public function check_leave($leave_id = NULL) {
        if (!$this->Leave->exists($leave_id)) {
            throw new NotFoundException(__('Invalid leave'));
        }
        if ($this->request->is('post')) {
            $leave_save = array();
            $leave_save['Leave']['id'] = $this->request->data['Leave']['id'];
            $leave_save['Leave']['pending'] = 0;
            $leave_save['Leave']['approved'] = $this->request->data['Leave']['status'];

            $this->Leave->create();
            if ($this->Leave->save($leave_save)) {
                $this->Session->setFlash(__('The leave has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The leave could not be saved. Please, try again.'));
            }
        }

        $res = $this->Leave->check_leaves($leave_id);
        $leave = $res['Leave'];
        $leaveType = $res['LeaveType'];
        $rules = $res['Rules'];
        $all_approved = $res['all_approved'];

        $this->set(compact('leave', 'leaveType', 'rules'));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $user = $this->currentAccount;
		if ($this->request->is('post')) {
			$this->Leave->create();
            if ($this->request->data['Leave']['start']) {
                $this->request->data['Leave']['start'] = date('Y-m-d H:i:s', strtotime($this->request->data['Leave']['start']));
            } else {
                $this->request->data['Leave']['start'] = NULL;
            }
            if ($this->request->data['Leave']['end']) {
                $this->request->data['Leave']['end'] = date('Y-m-d H:i:s', strtotime($this->request->data['Leave']['end']));
            } else {
                $this->request->data['Leave']['end'] = NULL;
            }
			if ($this->Leave->save($this->request->data)) {
                $leave_id = $this->Leave->getInsertID();
                $check_leaves = $this->Leave->check_leaves($leave_id);
                if (isset($check_leaves['Rules'][2]) && $check_leaves['Rules'][2] == true) {
                    if ($check_leaves['all_approved'] == true) {
                        $approved = 1;
                    } else {
                        $approved = 0;
                    }

                    $leave_save = array();
                    $leave_save['Leave']['id'] = $leave_id;
                    $leave_save['Leave']['pending'] = 0;
                    $leave_save['Leave']['approved'] = $approved;

                    $this->Leave->save($leave_save);
                }

				$this->Session->setFlash(__('The leave has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave could not be saved. Please, try again.'));
			}
		}
		$users = $this->Leave->User->get_users_list();
		$leaveTypes = $this->Leave->LeaveType->find('list');
		$this->set(compact('user', 'users', 'leaveTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $user = $this->currentAccount;
		if (!$this->Leave->exists($id)) {
			throw new NotFoundException(__('Invalid leave'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Leave']['start'] = date('Y-m-d H:i:s', strtotime($this->request->data['Leave']['start']));
            $this->request->data['Leave']['end'] = date('Y-m-d H:i:s', strtotime($this->request->data['Leave']['end']));
			if ($this->Leave->save($this->request->data)) {
				$this->Session->setFlash(__('The leave has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leave.' . $this->Leave->primaryKey => $id));
			$this->request->data = $this->Leave->find('first', $options);
		}
        $users = $this->Leave->User->get_users_list();
		$leaveTypes = $this->Leave->LeaveType->find('list');
		$this->set(compact('user', 'users', 'leaveTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Leave->id = $id;
		if (!$this->Leave->exists()) {
			throw new NotFoundException(__('Invalid leave'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leave->delete()) {
			$this->Session->setFlash(__('The leave has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
