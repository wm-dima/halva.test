<?php get_header(); ?>
 <div class="wrapper">
            <?php get_template_part('templates/search', 'catalog'); ?>
            </div>  
            <div class="wrapper">
                <div class="want"> 
                    <div class="item-navigation">
                        <ul>
                            <li>Желания</li>
                        </ul>
                    </div>
                </div>
            </div>           
            <div class="want-main">
                <div class="wrapper">
                    <div class="inside-want">
                        <div class="want-left">
                            <div class="want-catalog">
                            	<?php echo do_shortcode( '[get_wish_cats]' ); ?>
                            </div>
                            <div class="want-description">
                                <ul>
                                    <li>В раздел "Желания" Вы можете положить интересующие Вас товары, чтобы не забывать о них</li>
                                    <li>Кроме этого, после регистрации на сайте, Вам будет доступна возможность узнать, одним из первых, о поступлении данного товара или о снижении его стоимости.</li>
                                    <li>*Уведомления, о поступлении или снижении цены, будут приходить на вашу электронную почту.</li>
                                    <li>
                                        <a href="" class="log-in">
                                            <img src="../images/user.png" alt="">    
                                            Вход / Регистрация
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>   
                        <div class="want-right">
							<?php echo do_shortcode( '[show_wish_prods]' ) ?>
                        </div> 
                    </div>
                </div>
            </div>

<?php get_footer(); ?>