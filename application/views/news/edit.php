<form action="/news/edit/" method="post">
	<input type="input" class="form-control input-lg" name="slug" value="<?php echo $slug_news; ?>" placeholder="slug"><br>
	<input type="input" class="form-control input-lg" name="title" value="<?php echo $title_news; ?>" placeholder="название новости"><br>
	<textarea class="form-control input-lg" name="text" placeholder="текст новости"><?php echo $content_news; ?></textarea><br>
	<input type="submit" class="btn btn-default" name="submit" value="Добавить новость">
</form>