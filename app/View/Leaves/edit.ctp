<div class="span8">
<?php echo $this->Form->create('Leave'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leave'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
    <?php if ($currentAccount['group_id'] == 1): ?>
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Leave.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Leave.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Leaves'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
        </ul>
    <?php endif; ?>
</div>
