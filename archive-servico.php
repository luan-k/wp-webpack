<?php get_header() ?>

<section class="secao-pagina-sevicos">
    <div id="pagina-grid-servicos" class="mt-5 pt-5">
        <div class="container-fluid p-5">
            <div class="row">
                <?php 
                    $ourCurrentPage = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
                    $servicosPosts = new WP_Query(array(
                        'posts_per_page' => 2,
                        'post_type' => 'servico',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'paged'=> $ourCurrentPage
                      ));
                    while($servicosPosts->have_posts()){
                        $servicosPosts->the_post(); ?>
                        <div class="col-12 col-sm-4 col-md-3 post-card">
                            <a class="post-card d-flex align-content-between flex-wrap justify-content-center" href="<?php the_permalink(); ?>">
                                <div class="wraper-card d-flex align-content-between flex-wrap justify-content-center">
                                    
                                    <div class="image-title-wrapper">
                                        <img class="servicos-imagem" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" alt="">
                                        <h2 class="servicos-titulo"> <?php the_title() ?> </h2>
                                    </div>
                                    <p class="servicos-texto"> <?php 
                                        if (has_excerpt()) {
                                            echo wp_trim_words( get_the_excerpt(), 30);
                                        }else {
                                            echo wp_trim_words(get_the_content(), 30);
                                        }  ?> </p>
                                                    
                                </div>
                            </a>
                           
                        </div>
                <?php }
                ?>
                <div class="col-12">
                    <div class="pagination-wraper">
                        <div class="pagination-box">
                            <?php echo paginate_links(); ?>
                        </div>
                    </div>
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