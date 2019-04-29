<?php get_header(); ?>
<div class="wrapper">
            <?php get_template_part('templates/search', 'catalog'); ?>
            </div>
            <div class="wrapper">
                <div class="match"> 
                    <div class="item-navigation">
                        <ul>
                            <?php echo do_shortcode( '[get_comp_cats]' ); ?>
                        </ul>
                    </div>
                </div>
            </div>   
            <div class="match-main">
                <div class="wrapper">
                    <div class="inside-match">
                        <div class="match-preview">
                            
                        </div>    
                        <div class="match-elements">
                            <div class="match-wrap">
                                <div class="me1">
                                    <a href="" class="noActive">
                                        <div class="add-element">
                                            Добавить товар к сравнению
                                        </div>
                                    </a>    
                                </div>    
                                <div class="elements">

                            <?php do_shortcode( '[show_compared_prods]' ); ?>

                                </div> 
                            </div>

                            <div class="match-table">
                                <?php do_shortcode( '[show_compared_options]' ); ?>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>

<?php get_footer(); ?>