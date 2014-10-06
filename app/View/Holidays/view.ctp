<div class="span8">
<h2><?php echo __('Holiday'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="span3">
    <?php if ($currentAccount['group_id'] == 1): ?>
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit Holiday'), array('action' => 'edit', $holiday['Holiday']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Holiday'), array('action' => 'delete', $holiday['Holiday']['id']), array(), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Holidays'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Holiday'), array('action' => 'add')); ?> </li>
        </ul>
	<?php endif; ?>
</div>
