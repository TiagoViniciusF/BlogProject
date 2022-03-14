
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
    <div class="col-md-4 offset-md-4">
    <h1 class="text-center">{title}</h1>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" class="form-control" name="name" placeholder="Nome">
        </div>
        <br>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <br>
        <div class="form-group">
            <label>Nome de Usuario:</label>
            <input type="text" class="form-control" name="username" placeholder="Nome de Usuario">
        </div>
        <br>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" class="form-control" name="password" placeholder="Senha">
        </div>
        <br>
        <div class="form-group">
            <label>Confirmar Senha:</label>
            <input type="password" class="form-control" name="password2" placeholder="Confirmar Senha">
        </div>
        <br>
        <button type="submit" class="btn btn-primary col-12">Confirmar</button>
    </div>
</div>
<?php echo form_close(); ?>
