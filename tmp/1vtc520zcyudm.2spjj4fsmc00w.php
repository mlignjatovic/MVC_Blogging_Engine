<section class="uk-container uk-container-center uk-margin-medium">
<form  action="<?php echo $BASE; ?>/admin/upload" method="post" enctype="multipart/form-data">
	<input type="file" name="image">
	<input type="submit" name="submit">
</form>

	<table class="uk-table">
			<thead>
				<tr>
					<th>Image</th>
					<th>Path</th>
					<th>Action</th>
				</tr>
			</thead>	
			<tbody>
			<?php foreach (($images?:[]) as $image): ?>
				<tr>
					<td><img src="<?php echo $BASE; ?>/<?php echo $image['img_name']; ?>" width="100px"></td>
					<td><?php echo $BASE; ?>/<?php echo $image['img_name']; ?></td>
					<td><form action="<?php echo $BASE; ?>/admin/delete-image" method="post">
					   <input type="hidden" name="path" value="<?php echo $image['img_name']; ?>">
					   <input type="hidden" name="imgId" value="<?php echo $image['img_id']; ?>">
					   <input type="submit" name="delete" value="Delete">
					</form> </td>  
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>	
</section>