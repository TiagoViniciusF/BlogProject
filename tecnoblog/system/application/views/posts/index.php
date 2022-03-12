
<h2>{title}</h2>

<small class="post-date">Postado em {created_at}  </small><br>
<img class="post-img-index" src="{url}uploads/{post_image}">
<div class="post-body">
    <br><br>
   {body}
   
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']) :?>
<hr>
<div>

<a class="btn btn-primary" href="{url}posts/edit/{slug}">Editar</a>
<a class="btn btn-danger" href="{url}posts/delete/{id}">Apagar</a>

</div>
</form>
<?php endif; ?>
<hr>
<h3>Todos os Comentarios</h3>

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://tecnoblog1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    </form>