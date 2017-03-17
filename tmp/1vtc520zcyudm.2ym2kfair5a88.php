<div class="uk-margin-small uk-padding-large">
	<form class="tm-newpost uk-form-stacked uk-form-width-large" method="post" action='<?php echo $BASE; ?>/admin/<?php echo isset($postId) ? "update-post/$postId" : "insert-post"; ?>'>
		<fieldset>
			<label>
				Title
			</label>	
				<input class="uk-input" type="text" name="title" value="<?php echo isset($postTitle) ? $postTitle : ''; ?>"">
			
			<label>
			    Post
			</label>    
				<textarea class="uk-textarea" name="post-text"><?php echo isset($postText) ? $postText : ''; ?></textarea>
			<label>
				Select Post Category
			</label>
			<select class="uk-select" name="category">
				<?php foreach (($categories?:[]) as $category): ?>
					<option value="<?php echo $category['cat_name']; ?>"><?php echo $category['cat_name']; ?></option>
				<?php endforeach; ?>
			</select>
		</fieldset>
		<input class="uk-button uk-button-primary" type="submit" name="submit" value="<?php echo isset($postId) ? 'Update' : 'Submit'; ?>">
	</form>
</div>