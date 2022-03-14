
<div>
  

  <script>
      function SelectCategories(category){
      window.open(""+category+"", "_parent");
  }
  </script>
          <select class="form-select" name="categorias" id="categorias" style="width:150px; float:right" onChange="SelectCategories(this.value)">
              <option selected>Categorias</option>
              {loop_categories}
                  <option value="{url}categories/posts/{id}">
                 {name}</option>
              {/loop_categories}
                 
          </select>
      
      </div>

    
    {loop_posts}
  
    <h3>{title}</h3>
    <br>
    
    <div class="row" >
    <div  class="col-md-3" id="div" >
        <img class="post-thumb" src="{url}uploads/{post_image}">
        
    </div>
   
        <div class="col-md-9">
            
              
        <small class="post-date">Postado em {created_at} <strong>
            {name}</strong></small><br>
            <div class="textpost">{body}</div><br>
        <br>
        <p><a class="btn btn-secondary" href="{url}posts/{slug}">
    Leia Mais</a></p>

    </div>
    </div>
   
    {/loop_posts}