
<h2><?php echo __('Leave'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leave['User']['username'], array('controller' => 'users', 'action' => 'view', $leave['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leave Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leave['LeaveType']['name'], array('controller' => 'leave_types', 'action' => 'view', $leave['LeaveType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php
            if ($leave['Leave']['pending'] == 1) {
                echo 'Pending';
            } else {
                if ($leave['Leave']['approved'] == 1) {
                    echo 'Approved';
                } else if ($leave['Leave']['approved'] == 0) {
                    echo 'Rejected';
                }
            }
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leave['Leave']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

    <h4>Rules for leave</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Conditions</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaveType['LeaveRule'] as $rule): ?>
                <?php if ($rule['yn_condition'] > 0): ?>
                    <tr>
                        <td><?php echo h($rule['Rule']['id']); ?>&nbsp;</td>
                        <td><?php echo h($rule['Rule']['name']); ?>&nbsp;</td>
                        <td>
                            <?php
                                if ($rule['Rule']['id'] == 4) {
                                    echo $rule['num_condition']." in ".$rule['my_condition'];
                                } else if ($rule['Rule']['id'] == 6) {
                                    echo $rule['num_condition']. " day/days";
                                } else if ($rule['Rule']['id'] == 7) {
                                    echo $rule['num_condition']. " user/users";
                                }
                            ?>&nbsp;
                        </td>
                        <td>
                            <?php
                                if (isset($rules[$rule['rule_id']])) {
                                    if ($rules[$rule['rule_id']]['status'] == true) {
                                        echo '<span class="label label-success">Success</span>';
                                        echo " ".$rules[$rule['rule_id']]['message'];
                                    } else {
                                        echo '<span class="label label-warning">Warning</span>';
                                        echo " ".$rules[$rule['rule_id']]['message'];
                                    }
                                }
                            ?>&nbsp;
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php echo $this->Form->create('Leave'); ?>
    <?php echo $this->Form->input('id', array('value' => $leave['Leave']['id'])); ?>
    <?php echo $this->Form->input('status', array('type' => 'select', 'options' => array('1' => 'Approve', '0' => 'Reject'))); ?>
<?php echo $this->Form->end(__('Submit')); ?>
