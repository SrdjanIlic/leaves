<div class="span8">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		if ($currentAccount['group_id'] == 1) {
		    echo $this->Form->input('group_id');
		}
		echo $this->Form->input('username');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
    <?php if ($currentAccount['group_id'] == 1): ?>
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        </ul>
	<?php endif; ?>
</div>
