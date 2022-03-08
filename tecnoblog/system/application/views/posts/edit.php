
<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<form>
  <div class="form-group">
    <label >Titulo:</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title"
    value="<?php echo $post['title']; ?>">
  </div>
  <br>
  <div class="form-group">
    <label>Post:</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?>
  </textarea>
  </div>
  <br>
  <div class="form-group">
    <label>Categoria:</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Atualizar</button>
  <br>
  <br>
</form>