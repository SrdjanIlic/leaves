<div class="span8">
    <?php echo $this->Form->create('Leave'); ?>
	<fieldset>
		<legend><?php echo __('Add Leave'); ?></legend>
	<?php
	    if ($user['Group']['id'] == 1) {
		    echo $this->Form->input('user_id');
	    } else {
	        echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
	    }
		echo $this->Form->input('leave_type_id');
		echo $this->Form->input('start', array('type' => 'text'));
		echo $this->Form->input('end', array('type' => 'text'));
		echo $this->Form->input('note');
	?>
	</fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Leaves'), array('action' => 'index')); ?></li>
	</ul>
</div>
