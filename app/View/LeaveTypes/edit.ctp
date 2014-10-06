<div class="span8">
    <?php echo $this->Form->create('LeaveType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leave Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LeaveType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LeaveType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
