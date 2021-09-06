<?php get_header(); ?>

<!-- products -->
<section class="section-products" >
        <!-- <h2 class="title text-center">PRODUCTS</h2> -->
        <div class="container">
            <div class="row">
                <?php
                    /* $homepagePosts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'category_name' => 'eng'
                    )); */

                    while(have_posts()){
                    the_post(); ?>
                    <div class="col-12 col-sm-4">
                        <div class="card primary-bg" data-anime="bottom">
                            <a href="<?php the_permalink(); ?>" class="hyperlink-wraper">
                                
                                <div class="img-wraper">
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url('ProductImageList') ?>" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title title-3 white"><?php echo wp_trim_words( get_the_title(), 5);  ?></h4>
                                    <p class="card-text">
                                        <div class="single-price-wraper" >
                                            <h4 class="title-3 white" data-anime="right">por apenas:</h4>
                                            <h3 class="title-2 tertiary" data-anime="bottom">
                                                <?php 
                                                    $preco = get_field('preco');
                                                    
                                                    if( $preco ){?>
                                                        R$ <?php echo $preco;
                                                    }else {
                                                        echo 'consulte';
                                                    }
                                                    
                                                ?>
                                                
                                            </h3>
                                        </div>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                <?php } wp_reset_postdata();?>
                <div class="col-12">
                    <div class="pagination-wraper">
                        <div class="pagination-box">
                            <?php echo paginate_links(); ?>
                        </div>
                    </div>
                </div>             
            </div>
            
        </div>
    </section>

<?php get_footer(); ?>