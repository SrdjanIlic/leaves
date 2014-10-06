<div class="span8">
<?php echo $this->Form->create('Holiday'); ?>
	<fieldset>
		<legend><?php echo __('Add Holiday'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('start', array('type' => 'text'));
		echo $this->Form->input('end', array('type' => 'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Holidays'), array('action' => 'index')); ?></li>
	</ul>
</div>
