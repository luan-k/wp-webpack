<?php get_header() ?>

<section class="secao-pagina-sevicos">
    <div id="pagina-grid-servicos" class="mt-5 pt-5">
        <div class="container-fluid p-5">
            <div class="row">
                <?php 
                    $outCurrentPage = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
                    $servicosPosts = new WP_Query(array(
                        'posts_per_page' => 12,
                        'post_type' => 'servico',
                        'orderby' => 'date',
                        'order' => 'ASC'
                      ));
                    while($servicosPosts->have_posts()){
                        $servicosPosts->the_post(); ?>
                        <div class="col-12 col-sm-4 col-md-3 post-card">
                            <a class="post-card d-flex align-content-between flex-wrap justify-content-center" href="<?php the_permalink(); ?>">
                                <div class="wraper-card d-flex align-content-between flex-wrap justify-content-center">
                                    
                                    <div class="image-title-wrapper">
                                        <img class="servicos-imagem" src="<?php if(has_post_thumbnail()){  echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); } else { echo get_theme_file_uri('/img/standart-banner.png'); }  ?>" alt="">
                                        <h2 class="servicos-titulo"> <?php the_title() ?> </h2>
                                    </div>
                                    <p class="servicos-texto"> <?php echo wp_trim_words(get_the_content(), 30); ?> </p>
                                                    
                                </div>
                            </a>
                           
                        </div>
                <?php }
                ?>
                <div class="paginate-links-wraper col-12 d-flex justify-content-center"><?php
                    echo paginate_links(array(
                        'total' => $servicosPosts->max_num_pages
                    ));?>
                </div>
                <?php
                // Reset Query
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer() ?>