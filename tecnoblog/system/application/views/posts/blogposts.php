
<div>
  

  <script>
      function SelectCategories(category){
      window.open(""+category+"", "_parent");
  }
  </script>
          <select class="form-select" name="categorias" id="categorias" style="width:150px; float:right" onChange="SelectCategories(this.value)">
              <option selected>Categorias</option>
              <?php foreach($categories as $category) : ?>
                  <option value="<?php echo site_url('/categories/posts/'.$category['id']); ?>">
                  <?php echo $category['name']; ?></option>
              <?php endforeach; ?>
                 
          </select>
      
      </div>
      <h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <br>
    <h3><?php echo $post['title']; ?></h3>
    <div class="row">
    <div class="col-md-3">
        <img class="post-thumb" src="<?php echo site_url(); ?>uploads/<?php echo $post['post_image']; ?>">
        
    </div>
        <div class="col-md-9">
        <small class="post-date">Postado em <?php $data= new DateTime($post['created_at']); ?>
        <?php echo $data->format('d/m/Y'); ?> às <?php echo $data->format('H:i'); ?> em <strong>
            <?php echo $post['name']; ?></strong></small><br>
            <?php echo word_limiter($post['body'],65); ?><br>
        <br>
        <p><a class="btn btn-secondary" href="<?php echo site_url('/posts'.'/'.$post['slug']);?>">
    Leia Mais</a></p>

    </div>
    </div>
   
    <?php endforeach; ?>