<div class="holidays index">
	<h2><?php echo __('Holidays'); ?></h2>
	<table class="table table-striped">
	    <thead>
	        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('start'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
	        </tr>
	    </thead>
	    <tbody>
        <?php foreach ($holidays as $holiday): ?>
            <tr>
                <td><?php echo h($holiday['Holiday']['id']); ?>&nbsp;</td>
                <td><?php echo h($holiday['Holiday']['name']); ?>&nbsp;</td>
                <td><?php echo h($holiday['Holiday']['start']); ?>&nbsp;</td>
                <td><?php echo h($holiday['Holiday']['end']); ?>&nbsp;</td>
                <td><?php echo h($holiday['Holiday']['created']); ?>&nbsp;</td>
                <td><?php echo h($holiday['Holiday']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $holiday['Holiday']['id']), array('class' => 'btn btn-info')); ?>
                    <?php if ($currentAccount['group_id'] == 1): ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $holiday['Holiday']['id']), array('class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $holiday['Holiday']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?>
                    <?php endif; ?>
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
    <?php if ($currentAccount['group_id'] == 1): ?>
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('New Holiday'), array('action' => 'add')); ?></li>
        </ul>
	<?php endif; ?>
</div>
