<div class="span8">
<h2><?php echo __('Leave Type'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leaveType['LeaveType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($leaveType['LeaveType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leaveType['LeaveType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leaveType['LeaveType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

    <h4>Rules for leave type</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Conditions</th>
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
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="span3">
    <?php if ($currentAccount['group_id'] == 1): ?>
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit Leave Type'), array('action' => 'edit', $leaveType['LeaveType']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Leave Type'), array('action' => 'delete', $leaveType['LeaveType']['id']), array(), __('Are you sure you want to delete # %s?', $leaveType['LeaveType']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Leave Types'), array('action' => 'index')); ?> </li>
        </ul>
    <?php endif; ?>
</div>
