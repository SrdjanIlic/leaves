<div class="span8">
<?php echo $this->Form->create('LeaveRule'); ?>
	<fieldset>
		<legend><?php echo __('Add Leave Rule'); ?></legend>
	<?php
		echo $this->Form->input('leave_type_id');
		echo $this->Form->input('rule_id');
		echo $this->Form->input('value1');
		echo $this->Form->input('value2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Leave Rules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
