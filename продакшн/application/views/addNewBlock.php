<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Добавление нового блока </title>
	</head>
	
	<body>
		<div id='add_new_block'>
			<?=anchor('general', 'На главную');?>
			<?=form_open();?>
				<div class="form-group">
					<label for = 'block_title'> Добавление нового блока </label>
					<input type = 'text' id = 'block_title' name = 'block_title' />
				</divs>
				
				<div class="form-group">
					<label for = 'block_content'> Описание блока </label>
					<textarea rows = '5' id = 'block_content' class = "form-control" name = 'block_content' > </textarea>
				</div>

				<?php while($count >= 0): ?>
					<label class = "checkbox-inline">
						<input type = 'checkbox' name = 'category' value = '<?=$array['array' . $count]['categoryName'];?>' />
					<?=$array['array' . $count]['categoryName']?>
				</label>
				<?php
					--$count;
					endwhile;
				?>
				
				<p>
					<input type = 'submit' value = 'Добавить' name = 'add_block' />
				</p>
				<?=form_close();?>
		</div>

		<p> afsg a </p>
		
	</body>
</html>
	