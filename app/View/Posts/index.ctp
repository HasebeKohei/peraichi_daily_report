<div class="posts index">
	<h2><?php echo '日報一覧'; ?></h2>

	<!-- 追加フォーム -->
	<?php echo $this->Form->create('Post'); ?>
		<fieldset>
			<legend><?php echo '本日の作業予定'; ?></legend>
		<?php
			echo $this->Form->hidden('user_id', array('value'=>$userId));
			echo $this->Form->input('body', array('label' => false));
			echo $this->Form->hidden('type', array('value'=>1));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	<table cellpadding="0" cellspacing="0">
	<tbody>
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo h($post['User']['username']); ?>&nbsp;</td>
			<td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
			<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
			<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('add_selffeedback'), array('action' => 'add', $post['Post']['id'])); ?>
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
			</td>
		</tr>

		<!-- コメント表示 -->
		<?php foreach ($post['Comment'] as $cmt): ?>
			<tr>
				<td>Comments</td>
				<td colspan="4" ><?php echo h($cmt['body']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>

		<!-- コメント投稿 -->
		<tr>
			<td colspan="5" >
				<?php echo $this->Form->create('Comment'); ?>
					<fieldset>
						<legend><?php echo 'コメントを投稿する'; ?></legend>
					<?php
						echo $this->Form->hidden('user_id', array('value'=>$userId));
						echo $this->Form->hidden('post_id', array('value'=>h($post['Post']['id'])));
						echo $this->Form->input('body', array('label' => false));
					?>
					</fieldset>
				<?php echo $this->Form->end(__('Submit')); ?>
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
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>