<?php
App::uses('AppModel', 'Model');
/**
 * LeaveRule Model
 *
 * @property LeaveType $LeaveType
 * @property Rule $Rule
 */
class LeaveRule extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'leave_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rule_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'LeaveType' => array(
			'className' => 'LeaveType',
			'foreignKey' => 'leave_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Rule' => array(
			'className' => 'Rule',
			'foreignKey' => 'rule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
