<section class="uk-container uk-container-center uk-margin-medium">
	<table class="uk-table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Category</th>
				<th>Date</th>
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>	
		<tbody>
			
				<?php foreach (($result?:[]) as $item): ?>
					<tr>
						<td><?php echo $item['post_title']; ?></td>
						<td><?php echo $item['cat_name']; ?></td>
						<td><?php echo $item['nice_date']; ?></td>
						<td><a href="<?php echo $BASE; ?>/admin/edit-post/<?php echo $item['post_id']; ?>">Edit</a></td>
					<?php if ($SESSION['user_role'] == 'Administrator'): ?>
							
							<td><a href="<?php echo $BASE; ?>/admin/delete-post/<?php echo $item['post_id']; ?>">Delete</a></td>
						
						<?php else: ?>
							<td><span>You are not admin</span></td>
							
					<?php endif; ?>	
					</tr>
				<?php endforeach; ?>
			
		</tbody>
	</table>	
	<a href="<?php echo $BASE; ?>/admin/list-of-posts/<?php echo $links['0']; ?>">First</a>
		<?php foreach (($links?:[]) as $item): ?>
			
			<?php if ($item>'1' && $item < count($links)): ?>
		    	<a href="<?php echo $BASE; ?>/admin/list-of-posts/<?php echo $item; ?>"><?php echo $item; ?></a>
		    <?php endif; ?>
		    
		<?php endforeach; ?>
	<a href="<?php echo $BASE; ?>/admin/list-of-posts/<?php echo count($links); ?>">Last</a>
</section>