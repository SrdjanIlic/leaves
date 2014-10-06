<div class="span8">
<h2><?php echo __('Leave Rule'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leaveRule['LeaveRule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leave Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leaveRule['LeaveType']['name'], array('controller' => 'leave_types', 'action' => 'view', $leaveRule['LeaveType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leaveRule['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $leaveRule['Rule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value1'); ?></dt>
		<dd>
			<?php echo h($leaveRule['LeaveRule']['value1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value2'); ?></dt>
		<dd>
			<?php echo h($leaveRule['LeaveRule']['value2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leaveRule['LeaveRule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leaveRule['LeaveRule']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Leave Rule'), array('action' => 'edit', $leaveRule['LeaveRule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Leave Rule'), array('action' => 'delete', $leaveRule['LeaveRule']['id']), array(), __('Are you sure you want to delete # %s?', $leaveRule['LeaveRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Rules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Rule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
