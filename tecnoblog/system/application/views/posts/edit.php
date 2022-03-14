
<h2>Editando Post</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="{id}">
<form>
  <div class="form-group">
    <label >Titulo:</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title"
    value="{title}">
  </div>
  <br>
  <div class="form-group">
    <label>Post:</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body">{body}
  </textarea>
  </div>
  <br>
  <div class="form-group">
    <label>Categoria:</label>
    <select name="category_id" class="form-control">
    {loop_categories}
        <option value="{id}">{name}</option>
        {/loop_categories}
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Atualizar</button>
  <br>
  <br>
</form>