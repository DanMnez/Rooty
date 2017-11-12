<!-- Archivo de cabecera global de Wordpress -->
<?php get_header(); ?>

<!-- Page Content -->
    <div class="container primary-container">

<div class="row">
<!-- Listado de posts -->

<!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1> -->

          <?php if ( have_posts() ) : the_post(); ?>
            <section>
                <article>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <small>Publicado el <time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time> por <?php the_author_posts_link() ?></small>
                    <?php //the_category (); ?>
                    <?php the_content(); ?>
                    <?php //the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
                    <address>Por <?php the_author_posts_link() ?></address>
                </article>
                <!-- Comentarios -->
                <?php comments_template(); ?>
            </section>
          <?php else : ?>
            <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
          <?php endif; ?>

</div>

<!-- Archivo de barra lateral por defecto -->
<!-- Sidebar Widgets Column -->
      <div class="col-md-4">

           <?php get_sidebar(); ?>

      </div>
      <!-- /.row -->
    </div>
<!-- /.container -->
</div>

<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>
