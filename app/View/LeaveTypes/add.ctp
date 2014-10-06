<div class="span8">
    <?php echo $this->Form->create('LeaveType'); ?>
	<fieldset>
    <legend><?php echo __('Add Leave Type'); ?></legend>
	<?php
		echo $this->Form->input('LeaveType.name');
	?>
	</fieldset>
    <fieldset>
        <legend><?php echo __('Add rules for leave type'); ?></legend>
        <?php
            echo $this->Form->input('LeaveRule.1.value', array('label' => 'Require end (Y/N)', 'value' => 1, 'type' => 'checkbox'));
        ?>
        <?php
            echo $this->Form->input('LeaveRule.2.value', array('label' => 'Auto approve (Y/N)', 'value' => 2, 'type' => 'checkbox'));
        ?>
        <?php
            echo $this->Form->input('LeaveRule.3.value', array('label' => 'Paid (Y/N)', 'value' => 3, 'type' => 'checkbox'));
        ?>
        <?php
            echo $this->Form->input('LeaveRule.4.value', array('label' => 'Days allowed in month/year per user (number of days, month/year)', 'value' => 4, 'type' => 'checkbox'));
        ?>
        <div id='rule_4'>
            <?php echo $this->Form->input('LeaveRule.4.num_condition', array('label' => 'Number of days')); ?>
            <?php echo $this->Form->input('LeaveRule.4.my_condition', array('type' => 'select', 'options' => array('Month' => 'Month', 'Year' => 'Year'), 'label' => 'Month/Year')); ?>
        </div>
        <?php
            echo $this->Form->input('LeaveRule.5.value', array('label' => 'Exclude holidays (Y/N)', 'value' => 5, 'type' => 'checkbox'));
        ?>
        <?php
            echo $this->Form->input('LeaveRule.6.value', array('label' => 'Must be booked in advance (number of days)', 'value' => 6, 'type' => 'checkbox'));
        ?>
        <div id='rule_6'>
            <?php echo $this->Form->input('LeaveRule.6.num_condition', array('label' => 'Number of days')); ?>
        </div>
        <?php
            echo $this->Form->input('LeaveRule.7.value', array('label' => 'Maximum users allowed at the same time (number of users)', 'value' => 7, 'type' => 'checkbox'));
        ?>
        <div id='rule_7'>
            <?php echo $this->Form->input('LeaveRule.7.num_condition', array('label' => 'Number of users')); ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
