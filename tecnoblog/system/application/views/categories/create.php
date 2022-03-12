
<h2>{create_categories}</h2>

{validacao}

<?php echo form_open_multipart('categories/create'); ?>

<div class="form-group">
    <label>Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome">
</div>
<br><button type="submit" class="btn btn-secondary">Criar</button>
</form>