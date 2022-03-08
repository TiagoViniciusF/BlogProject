
<?php if($comments) : ?>
    <?php foreach($comments as $comment): ?>
        <div class="well">
            <h6><?php echo $comment['body']; ?> [de <strong><?php echo $comment['name']; ?></strong>
            ]</h6>
        </div>
        <?php endforeach; ?>
<?php else : ?>
    <p>Sem Comentarios</p>
<?php endif; ?>
<hr>
<h3>Adicionar Comentarios</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']) ?>
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control">
        <br>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="text" name="email" class="form-control">
        <br>
    </div>
    <div class="form-group">
        <label>Comentario:</label>
        <textarea name="body" class="form-control"></textarea>
        <br>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button class="btn btn-primary" type="submit">Enviar</button>
    <br><br>