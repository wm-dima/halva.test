                        <div class="help-nav-1 help-nav">
                            <p class="the-title">Автоазарт</p>
                            <?php wp_nav_menu( [
                             'menu' => 'auto_azart', 
                             'menu_class' => 'dynamic-menu'
                            ] ); ?>
            <!--                 <ul>
                                <li>Автоазарт</li>
                                <li><a href="">О компании</a></li>
                                <li><a href="">Контакты</a></li>
                                <li><a href="">Новости</a></li>
                                <li><a href="">Статьи</a></li>
                            </ul> -->
                        </div>
                        <div class="help-nav-2 help-nav">
                            <p class="the-title">ОПТ И ЗАКУПКА</p>
                            <?php wp_nav_menu( [
                             'menu' => 'whole_sale', 
                             'menu_class' => 'dynamic-menu'
                            ] ); ?>
                        </div>
                        <div class="help-nav-3 help-nav">
                            <p class="the-title">ИНТЕРНЕТ-МАГАЗИН</p>
                            <?php wp_nav_menu( [
                             'menu' => 'e_shop', 
                             'menu_class' => 'dynamic-menu'
                            ] ); ?>
                        </div>
                        <div class="help-nav-4 help-nav">
                            <p class="the-title">ПОМОЩЬ</p>
                            <?php wp_nav_menu( [
                             'menu' => 'help_menu', 
                             'menu_class' => 'dynamic-menu'
                            ] ); ?>
                        </div>