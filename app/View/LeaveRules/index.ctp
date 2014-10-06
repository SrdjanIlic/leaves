<div class="leaveRules index">
	<h2><?php echo __('Leave Rules'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('leave_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('value1'); ?></th>
			<th><?php echo $this->Paginator->sort('value2'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leaveRules as $leaveRule): ?>
	<tr>
		<td><?php echo h($leaveRule['LeaveRule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($leaveRule['LeaveType']['name'], array('controller' => 'leave_types', 'action' => 'view', $leaveRule['LeaveType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($leaveRule['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $leaveRule['Rule']['id'])); ?>
		</td>
		<td><?php echo h($leaveRule['LeaveRule']['value1']); ?>&nbsp;</td>
		<td><?php echo h($leaveRule['LeaveRule']['value2']); ?>&nbsp;</td>
		<td><?php echo h($leaveRule['LeaveRule']['created']); ?>&nbsp;</td>
		<td><?php echo h($leaveRule['LeaveRule']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leaveRule['LeaveRule']['id']), array('class' => 'btn btn-info')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leaveRule['LeaveRule']['id']), array('class' => 'btn btn-info')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leaveRule['LeaveRule']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $leaveRule['LeaveRule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Leave Rule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
