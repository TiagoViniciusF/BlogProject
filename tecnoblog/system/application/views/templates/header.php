<!DOCTYPE html>
<html lang="en">
   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnoblog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{url}assets/css/style.css">
    <script src="http://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




</head>
<body>
<script id="dsq-count-scr" src="//tecnoblog1.disqus.com/count.js" async></script>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{url}posts">Tecnoblog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{url}posts/about">About</a>
                    </li>
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                <?php if($this->session->userdata('logged_in')) :?>
                <li>
                    <a class="nav-link" href="{url}posts/create">Criar Post</a> 
                </li>
                <li>
                    <a class="nav-link" href="{url}categories/create">Criar Categorias</a> 
                </li>
                <li>
                    <a class="nav-link" href="{url}users/logout">Sair</a> 
                </li>
                <?php endif; ?>
                <?php if(!$this->session->userdata('logged_in')) :?>
                <li>
                    <a class="nav-link" href="{url}users/register">Inscrever-se</a> 
                </li>
                <li>
                    <a class="nav-link" href="{url}users/login">Entrar</a> 
                </li>
                <?php endif; ?>
                  
                </ul>
            </div>
        </div>
    </nav>

  

    <div class="container">

    <!--Messages-->

    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedout')
        .'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted')
        .'</p>'; ?>
        <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>