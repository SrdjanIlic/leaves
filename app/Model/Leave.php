<?php
App::uses('AppModel', 'Model');
/**
 * Leave Model
 *
 * @property User $User
 * @property LeaveType $LeaveType
 */
class Leave extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LeaveType' => array(
			'className' => 'LeaveType',
			'foreignKey' => 'leave_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * @param null $leave_id
     * @return array
     */
    public function get_leave($leave_id = NULL) {
        $leave = array();
        if ($leave_id == NULL) {
            return $leave;
        }
        $leave = $this->find('first', array(
            'contain' => array('User', 'LeaveType'),
            'conditions' => array('Leave.id' => $leave_id)
        ));
        return $leave;
    }

    /**
     * @param null $leave_id
     * @return array
     */
    public function check_leaves ($leave_id = NULL) {
        $res = array();
        $leave = $this->get_leave($leave_id);

        $LeaveType = ClassRegistry::init('LeaveType');
        $leaveType = $LeaveType->get_leave_type($leave['LeaveType']['id']);
        $rules = array();

        $request_rules = array();
        foreach ($leaveType['LeaveRule'] as $k_rule => $v_rule) {
            if ($v_rule['yn_condition']) {
                $request_rules[$v_rule['rule_id']] = $v_rule['rule_id'];
            }
        }

        $all_approved = true;
        foreach ($leaveType['LeaveRule'] as $k_rule => $v_rule) {
            if ($v_rule['rule_id'] == 1 && $v_rule['yn_condition'] == 1) {
                $rules[$v_rule['rule_id']] = $this->check_require_end($leave['Leave']['end']);
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 2 && $v_rule['yn_condition'] == 1) {
                $rules[$v_rule['rule_id']]['status'] = true;
                $rules[$v_rule['rule_id']]['message'] = "";
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 3 && $v_rule['yn_condition'] == 1) {
                $rules[$v_rule['rule_id']]['status'] = true;
                $rules[$v_rule['rule_id']]['message'] = "";
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 4 && $v_rule['yn_condition'] == 1) {
                $holiday = (isset($request_rules[5])) ? true : false;
                $rules[$v_rule['rule_id']] = $this->check_days_allowed($leave['User']['id'], $leave['Leave']['start'], $leave['Leave']['end'], $v_rule['num_condition'], $v_rule['my_condition'], $holiday);
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 5 && $v_rule['yn_condition'] == 1) {
                $rules[$v_rule['rule_id']]['status'] = true;
                $rules[$v_rule['rule_id']]['message'] = "";
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 6 && $v_rule['yn_condition'] == 1) {
                $created = date('Y-m-d', strtotime($leave['Leave']['created']));
                $rules[$v_rule['rule_id']] = $this->check_booked_in_advance ($v_rule['num_condition'], $created, $leave['Leave']['start']);
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            } else if ($v_rule['rule_id'] == 7 && $v_rule['yn_condition'] == 1) {
                $rules[$v_rule['rule_id']] = $this->check_maximum_users ($leave['User']['id'], $v_rule['num_condition'], $leave['Leave']['start'], $leave['Leave']['end']);
                if ($all_approved) {
                    $all_approved = $rules[$v_rule['rule_id']]['status'];
                }
            }
        }

        $res['Leave'] = $leave;
        $res['LeaveType'] = $leaveType;
        $res['Rules'] = $rules;
        $res['all_approved'] = $all_approved;

        return $res;
    }


    /**
     * @param null $end_date
     * @return bool
     */
    public function check_require_end ($end_date = NULL) {
        $result = array();
        if ($end_date == NULL) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
        }
        $result['message'] = "";
        return $result;
    }

    /**
     * @param null $num_advance
     * @param null $created_date
     * @param null $start_date
     * @return bool
     */
    public function check_booked_in_advance ($num_advance = NULL, $created_date = NULL, $start_date = NULL) {
        $result = array();
        $date_diff = $this->get_num_date_between($created_date, $start_date);

        if ($date_diff >= $num_advance) {
            $result['status'] = true;
        } else {
            $result['status'] = false;
        }

        $result['message'] = "Request is created ".$date_diff." day/days before leave.";
        return $result;
    }

    /**
     * @param null $user_id
     * @param null $max_users
     * @param null $start_date
     * @param null $end_date
     * @return bool
     */
    public function check_maximum_users ($user_id = NULL, $max_users = NULL, $start_date = NULL, $end_date = NULL) {
        $result = array();
        $users_in_month = $this->find('all', array(
            'recursive' => -1,
            'fields' => array(''),
            'conditions' => array(
                'Leave.approved' => 1,
                'NOT' => array('Leave.user_id' => $user_id),
                'OR' => array(
                    array(
                        'Leave.start <= ' => $start_date,
                        'Leave.end >= ' => $start_date,
                    ),
                    array(
                        'Leave.start <= ' => $end_date,
                        'Leave.end >= ' => $end_date,
                    ),
                )
            )
        ));

        $users = array();
        foreach ($users_in_month as $k_user => $v_user) {
            $users[$v_user['Leave']['user_id']] = $v_user['Leave']['user_id'];
        }

        $user_count = count($users);

        if ($max_users > $user_count) {
            $result['status'] = true;
        } else {
            $result['status'] = false;
        }

        $result['message'] = $user_count." user/users are on leave at this period";
        return $result;

    }

    /**
     * @param null $user_id
     * @param null $start_date
     * @param null $end_date
     * @param null $day_num
     * @param null $type_con
     * @param bool $holiday
     * @return array|bool
     */
    public function check_days_allowed ($user_id = NULL, $start_date = NULL, $end_date = NULL, $day_num = NULL, $type_con = NULL, $holiday = false) {

        $result = array();
        if ($type_con == 'Month') {

            $year_start = date('Y', strtotime($start_date));
            $year_end = date('Y', strtotime($end_date));
            $month_start = date('m', strtotime($start_date));
            $month_end = date('m', strtotime($end_date));

            if ($month_start == $month_end) {
                $holidays_count = 0;
                $leave_in_month = $this->get_num_date_in_leaves_by_month($user_id, $year_start, $month_start, $holiday);
                $num_leave = $this->get_num_date_between($start_date, $end_date);
                $count_leave = (int) $num_leave + (int) $leave_in_month;
                if ($holiday == true) {
                    $holidays_count = $this->get_num_date_in_holidays($start_date, $end_date);
                    $count_leave = (int) $count_leave - (int) $holidays_count;
                }

                if ($count_leave <= $day_num) {
                    $result['status'] = true;
                } else {
                    $result['status'] = false;
                }

                $message = "";
                $message .= "Used day/days in ".$month_start.". month: ".$leave_in_month.". ";
                $message .= "Request day/days for leave in ".$month_start.". month: ".$num_leave.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave - (int) $holidays_count;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $result['message'] = $message;
                return $result;

            } else {

                $holidays_count_start = 0;
                $leave_in_month_start = $this->get_num_date_in_leaves_by_month($user_id, $year_start, $month_start, $holiday);
                $first = date('Y-m-d', strtotime($year_start.'-'.$year_start.'-1'));
                $last = date('Y-m-t', strtotime($year_start.'-'.$month_start.'-1'));
                $start = ($start_date >= $first) ? $start_date : $first;
                $end = ($end_date <= $last) ? $end_date : $last;
                $num_leave_start = $this->get_num_date_between($start, $end);
                $count_leave_start = (int) $num_leave_start + (int) $leave_in_month_start;
                if ($holiday == true) {
                    $holidays_count_start = $this->get_num_date_in_holidays($start, $end);
                    $count_leave_start = (int) $count_leave_start - (int) $holidays_count_start;
                }

                $holidays_count_end = 0;
                $leave_in_month_end = $this->get_num_date_in_leaves_by_month($user_id, $year_end, $month_end, $holiday);
                $first = date('Y-m-d', strtotime($year_end.'-'.$month_end.'-1'));
                $last = date('Y-m-t', strtotime($year_end.'-'.$month_end.'-1'));
                $start = ($start_date >= $first) ? $start_date : $first;
                $end = ($end_date <= $last) ? $end_date : $last;
                $num_leave_end = $this->get_num_date_between($start, $end);
                $count_leave_end = (int) $num_leave_end + (int) $leave_in_month_end;
                if ($holiday == true) {
                    $holidays_count_end = $this->get_num_date_in_holidays($start, $end);
                    $count_leave_end = (int) $count_leave_end - (int) $holidays_count_end;
                }

                if ($count_leave_start <= $day_num && $count_leave_end <= $day_num) {
                    $result['status'] = true;
                } else {
                    $result['status'] = false;
                }

                $message = "";
                $message .= "Used day/days in ".$month_start.". month: ".$leave_in_month_start.". ";
                $message .= "Request day/days for leave in ".$month_start.". month: ".$num_leave_start.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave_start - (int) $holidays_count_start;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count_start." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $message .= "Used day/days in ".$month_end.". month: ".$leave_in_month_end.". ";
                $message .= "Request day/days for leave in ".$month_end.". month: ".$num_leave_end.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave_end - (int) $holidays_count_end;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count_end." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $result['message'] = $message;
                return $result;
            }

        } else if ($type_con == 'Year') {

            $year_start = date('Y', strtotime($start_date));
            $year_end = date('Y', strtotime($end_date));

            if ($year_start == $year_end) {

                $holidays_count = 0;
                $leave_in_year = $this->get_num_date_in_leaves_by_year($user_id, $year_start, $holiday);
                $num_leave = $this->get_num_date_between($start_date, $end_date);
                $count_leave = (int) $num_leave + (int) $leave_in_year;
                if ($holiday == true) {
                    $holidays_count = $this->get_num_date_in_holidays($start_date, $end_date);
                    $count_leave = (int) $count_leave - (int) $holidays_count;
                }

                if ($count_leave <= $day_num) {
                    $result['status'] = true;
                } else {
                    $result['status'] = false;
                }

                $message = "";
                $message .= "Used day/days in ".$year_start." year: ".$leave_in_year.". ";
                $message .= "Request day/days for leave in ".$year_start." year: ".$num_leave.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave - (int) $holidays_count;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $result['message'] = $message;
                return $result;

            } else {

                $holidays_count_start = 0;
                $leave_in_year_start = $this->get_num_date_in_leaves_by_year($user_id, $year_start, $holiday);
                $first = date('Y-m-d', strtotime($year_start.'-01-01'));
                $last = date('Y-m-t', strtotime($year_start.'-12-01'));
                $start = ($start_date >= $first) ? $start_date : $first;
                $end = ($end_date <= $last) ? $end_date : $last;
                $num_leave_start = $this->get_num_date_between($start, $end);
                $count_leave_start = (int) $num_leave_start + (int) $leave_in_year_start;
                if ($holiday == true) {
                    $holidays_count_start = $this->get_num_date_in_holidays($start, $end);
                    $count_leave_start = (int) $count_leave_start - (int) $holidays_count_start;
                }

                $holidays_count_end = 0;
                $leave_in_year_end = $this->get_num_date_in_leaves_by_year($user_id, $year_end, $holiday);
                $first = date('Y-m-d', strtotime($year_end.'-01-01'));
                $last = date('Y-m-t', strtotime($year_end.'-12-01'));
                $start = ($start_date >= $first) ? $start_date : $first;
                $end = ($end_date <= $last) ? $end_date : $last;
                $num_leave_end = $this->get_num_date_between($start, $end);
                $count_leave_end = (int) $num_leave_end + (int) $leave_in_year_end;
                if ($holiday == true) {
                    $holidays_count_end = $this->get_num_date_in_holidays($start, $end);
                    $count_leave_end = (int) $count_leave_end - (int) $holidays_count_end;
                }

                if ($count_leave_start <= $day_num && $count_leave_end <= $day_num) {
                    $result['status'] = true;
                } else {
                    $result['status'] = false;
                }

                $message = "";
                $message .= "Used day/days in ".$year_start.". year: ".$leave_in_year_start.". ";
                $message .= "Request day/days for leave in ".$year_start.". year: ".$num_leave_start.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave_start - (int) $holidays_count_start;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count_start." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $message .= "Used day/days in ".$year_end.". year: ".$leave_in_year_end.". ";
                $message .= "Request day/days for leave in ".$year_end.". year: ".$num_leave_end.". ";
                if ($holiday == true) {
                    $leave_days = (int) $num_leave_end - (int) $holidays_count_end;
                    $leave_days = ($leave_days < 0) ? 0 : $leave_days;
                    $message .= "Subtracted ".$holidays_count_end." day/days of holiday. Actual leave: ".$leave_days. " day/days. ";
                }
                $result['message'] = $message;
                return $result;
            }

        } else {
            return false;
        }
    }

    /**
     * @param null $user_id
     * @param null $year
     * @param null $month
     * @param bool $holiday
     * @return int
     */
    public function get_num_date_in_leaves_by_month ($user_id = NULL, $year = NULL, $month = NULL, $holiday = false) {

        $leaves_in_month_all = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Leave.user_id' => $user_id,
                'Leave.approved' => 1,
                'Leave.start >= ' => date('Y-m-d', strtotime($year.'-'.$month.'-1')),
                'Leave.end <= ' => date('Y-m-t', strtotime($year.'-'.$month.'-1')),
            )
        ));

        $leave_count = 0;
        foreach ($leaves_in_month_all as $k_month => $v_month) {
            $s = date('Y-m-d', strtotime($v_month['Leave']['start']));
            $e = date('Y-m-d', strtotime($v_month['Leave']['end']));

            $first = date('Y-m-d', strtotime($year.'-'.$month.'-1'));
            $last = date('Y-m-t', strtotime($year.'-'.$month.'-1'));
            $start_date = ($s >= $first) ? $s : $first;
            $end_date = ($e <= $last) ? $e : $last;

            $num = $this->get_num_date_between($start_date, $end_date);
            if ($holiday == true) {
                $holidays_count = $this->get_num_date_in_holidays($start_date, $end_date);
                $num = (int) $num - (int) $holidays_count;
                $num = ($num < 0) ? 0 : $num;
            }
            $leave_count = (int) $leave_count + (int) $num;
        }

        return $leave_count;
    }

    /**
     * @param null $user_id
     * @param null $year
     * @param bool $holiday
     * @return int
     */
    public function get_num_date_in_leaves_by_year ($user_id = NULL, $year = NULL, $holiday = false) {

        $leaves_in_year_all = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Leave.user_id' => $user_id,
                'Leave.approved' => 1,
                'Leave.start >= ' => date('Y-m-d', strtotime($year.'-01-01')),
                'Leave.end <= ' => date('Y-m-t', strtotime($year.'-12-01')),
            )
        ));

        $leave_count = 0;
        foreach ($leaves_in_year_all as $k_year => $v_year) {
            $s = date('Y-m-d', strtotime($v_year['Leave']['start']));
            $e = date('Y-m-d', strtotime($v_year['Leave']['end']));

            $first = date('Y-m-d', strtotime($year.'-01-01'));
            $last = date('Y-m-t', strtotime($year.'-12-01'));
            $start_date = ($s >= $first) ? $s : $first;
            $end_date = ($e <= $last) ? $e : $last;

            $num = $this->get_num_date_between($start_date, $end_date);
            if ($holiday == true) {
                $holidays_count = $this->get_num_date_in_holidays($start_date, $end_date);
                $num = (int) $num - (int) $holidays_count;
                $num = ($num < 0) ? 0 : $num;
            }
            $leave_count = (int) $leave_count + (int) $num;
        }

        return $leave_count;
    }

    /**
     * @param null $start_date
     * @param null $end_date
     * @return int
     */
    public function get_num_date_in_holidays ($start_date = NULL, $end_date = NULL) {

        $Holiday = ClassRegistry::init('Holiday');
        $holidays_in_month_all = $Holiday->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Holiday.start <= ' => date('Y-m-d', strtotime($end_date)),
                'Holiday.end >= ' => date('Y-m-d', strtotime($start_date)),
            )
        ));

        $holiday_count = 0;
        foreach ($holidays_in_month_all as $k_holiday => $v_holiday) {
            $s = date('Y-m-d', strtotime($v_holiday['Holiday']['start']));
            $e = date('Y-m-d', strtotime($v_holiday['Holiday']['end']));

            $first = ($s >= $start_date) ? $s : $start_date;
            $last = ($e <= $end_date) ? $e : $end_date;

            $num = $this->get_num_date_between($first, $last);
            $holiday_count = (int) $holiday_count + (int) $num;
        }

        return $holiday_count;
    }

    /**
     * @param $start_date
     * @param $end_date
     * @return float
     */
    public function get_num_date_between ($start_date, $end_date) {
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        $datediff = $end - $start;
        return floor($datediff/(60*60*24))+1;
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    public function get_days_in_between($start, $end) {
        $day = 86400; // Day in seconds
        $format = 'Y-m-d'; // Output format (see PHP date funciton)
        $sTime = strtotime($start); // Start as time
        $eTime = strtotime($end); // End as time
        $numDays = round(($eTime - $sTime) / $day) + 1;
        $days = array();

        for ($d = 0; $d < $numDays; $d++) {
            $days[] = date($format, ($sTime + ($d * $day)));
        }
        return $days;
    }
}
