<div class="leaves index">
	<h2><?php echo __('Leaves'); ?></h2>
	<table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('User.username', 'Username'); ?></th>
                <th><?php echo $this->Paginator->sort('leave_type_id'); ?></th>
                <th><?php echo $this->Paginator->sort('start'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
                <th><?php echo $this->Paginator->sort('approved', 'Status'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
	<tbody>
        <?php foreach ($leaves as $leave): ?>
            <tr>
                <td><?php echo h($leave['Leave']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($leave['User']['username'], array('controller' => 'users', 'action' => 'view', $leave['User']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($leave['LeaveType']['name'], array('controller' => 'leave_types', 'action' => 'view', $leave['LeaveType']['id'])); ?>
                </td>
                <td><?php echo h($leave['Leave']['start']); ?>&nbsp;</td>
                <td><?php echo h($leave['Leave']['end']); ?>&nbsp;</td>
                <td>
                    <?php
                        if ($leave['Leave']['pending'] == 1) {
                            echo '<span class="label">Pending</span>';
                        } else {
                            if ($leave['Leave']['approved'] == 1) {
                                echo '<span class="label label-success">Approved</span>';
                            } else if ($leave['Leave']['approved'] == 0) {
                                echo '<span class="label label-important">Rejected</span>';
                            }
                        }
                    ?>&nbsp;</td>
                <td><?php echo h($leave['Leave']['created']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $leave['Leave']['id']), array('class' => 'btn btn-info')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leave['Leave']['id']), array('class' => 'btn btn-info')); ?>
                    <?php
                        if ($group_id == 1) {
                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leave['Leave']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $leave['Leave']['id']));
                            echo " ";
                            if ($leave['Leave']['pending'] == 1) {
                                echo $this->Html->link(__('Approve'), array('action' => 'check_leave', $leave['Leave']['id']), array('class' => 'btn btn-warning'));
                            }
                        }
                    ?>
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
		<li><?php echo $this->Html->link(__('New Leave'), array('action' => 'add')); ?></li>
	</ul>
</div>
