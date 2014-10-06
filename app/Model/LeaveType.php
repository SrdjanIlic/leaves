<?php
App::uses('AppModel', 'Model');
/**
 * LeaveType Model
 *
 * @property LeaveRule $LeaveRule
 * @property Leave $Leave
 */
class LeaveType extends AppModel {

    /**
     * @var array
     */
    public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'LeaveRule' => array(
			'className' => 'LeaveRule',
			'foreignKey' => 'leave_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Leave' => array(
			'className' => 'Leave',
			'foreignKey' => 'leave_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    /**
     * @param null $data
     * @return bool
     */
    public function save_leave_type ($data = NULL) {

        if ($data == NULL) {
            return false;
        }

        //Start transaction
        $dataSource = $this->getDataSource();
        $dataSource->begin($this);
        $transactionStatus = true;

        $leave_type_save = array();
        $leave_type_save['LeaveType']['name'] = $data['LeaveType']['name'];

        if ($transactionStatus) {
            if (!$this->save($leave_type_save)) {
                $transactionStatus = false;
            } else {
                $leave_type_id = $this->getInsertID();
            }
        }

        if ($transactionStatus) {
            $leave_rule = array();
            foreach ($data['LeaveRule'] as $k_leave => $v_leave) {

                if ($v_leave['value'] == 0) {
                    $yn_condition = 0;
                    $num_condition = 0;
                    $my_condition = 0;
                } else {
                    $yn_condition = 1;
                    $num_condition = (isset($v_leave['num_condition']))?$v_leave['num_condition']:0;
                    $my_condition = (isset($v_leave['my_condition']))?$v_leave['my_condition']:0;
                }

                $leave_rule[] = array(
                    'leave_type_id' => $leave_type_id,
                    'rule_id' => $k_leave,
                    'yn_condition' => $yn_condition,
                    'num_condition' => $num_condition,
                    'my_condition' => $my_condition
                );
            }
            $LeaveRule = ClassRegistry::init('LeaveRule');
            if (!$LeaveRule->saveMany($leave_rule, array('atomic'=>false))) {
                $transactionStatus = false;
            }
        }

        if ($transactionStatus) {
            $dataSource->commit();
            return true;
        } else {
            $dataSource->rollback();
            return false;
        }
    }

    /**
     * @param null $leave_type_id
     * @return array
     */
    public function get_leave_type($leave_type_id = NULL) {
        $leave_type = array();
        if ($leave_type_id == NULL) {
            return $leave_type;
        }

        $leave_type = $this->find('first', array(
            'contain' => array('LeaveRule.Rule'),
            'conditions' => array('LeaveType.id' => $leave_type_id)
        ));

        return $leave_type;
    }

}
