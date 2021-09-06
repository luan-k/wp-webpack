<?php get_header(); ?>

<!-- products -->
<section  >
        <!-- <h2 class="title text-center">PRODUCTS</h2> -->
        <div class="container py-5">
            <div class="row row-search py-5 my-5">
            <?php 
                if(have_posts()){
                while (have_posts()) {
                    the_post(); 
                    if (get_post_type() == 'servico'){?>
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
                    <?php }if (get_post_type() == 'post'){ ?>
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
                
                    <?php }
                     } 
                ?>
                <div class="col-12">
                    <div class="pagination-wraper">
                        <div class="pagination-box">
                            <?php echo paginate_links(); ?>
                        </div>
                    </div>
                </div>  
                <?php
                }else {
                echo '<h2 class="title-2 secondary">Não encontramos o que você procura</h2>';
                }
            
            ?>              
            </div>
        </div>
    </section>

<?php get_footer(); ?>