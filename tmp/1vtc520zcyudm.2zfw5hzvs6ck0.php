<section class="uk-container uk-container-center uk-margin-medium ">
<div uk-grid>
	<div class="uk-width-3-4">
		<table class="uk-table">
	<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Action</th>
			</tr>
		</thead>	
	<?php foreach (($users?:[]) as $user): ?>
		<tr>
			<td><?php echo $user['user_name']; ?></td>
			<td><?php echo $user['user_email']; ?></td>
			<td><?php echo $user['rol_name']; ?></td>
			<?php if ($SESSION['user_role'] == 'Administrator'): ?>
				
					<td><a href="<?php echo $BASE; ?>/admin/delete-user/<?php echo $user['user_id']; ?>">Delete</a></td>
					
				<?php else: ?>
					<td><span>You are not Admin</span></td>
					
			<?php endif; ?>	
		</tr>		
	<?php endforeach; ?>
</table>	
	</div>
	<div class="uk-width-1-4 uk-padding-large">
	<?php if ($SESSION['user_role'] == 'Administrator'): ?>
		<form class="uk-form-width-medium" action="<?php echo $BASE; ?>/admin/new-user" method="post">
			<fieldset>
					<legend class="uk-legend uk-text-center">New User</legend>
				<label>Username:</label>
					<input class="uk-input" type="text" name="username">
				<label>Password:</label>
					<input class="uk-input" type="password" name="password">
				<label>E-mail:</label>
					<input class="uk-input" type="email" name="email">
				<label>Set Role:</label>
					<select class="uk-select" name="role">
						<?php foreach (($roles?:[]) as $rol): ?>
							<option value="<?php echo $rol['rol_name']; ?>"><?php echo $rol['rol_name']; ?></option>
						<?php endforeach; ?>	
					</select>
			</fieldset>	
				<input class="uk-button uk-button-secondary uk-align-center" type="submit" name="register" value="Register">
		</form>
	<?php endif; ?>
	</div>
	
</div>	
</section>
