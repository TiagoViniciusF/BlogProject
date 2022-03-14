
<?php echo form_open('users/login'); ?>
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1><p class="text-center">{title}</p></h1>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Nome de Usuario"
            required autofocus>
            <br>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Senha"
            required autofocus>
        </div>
        <br>
        <button type="submit" class="btn btn-primary col-12">Login</button>
    </div>
</div>

    <?php echo form_close(); ?>