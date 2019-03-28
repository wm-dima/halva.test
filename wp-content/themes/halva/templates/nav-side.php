                        <div class="help-nav-1 help-nav">
                            <!-- <p class="the-title">Автоазарт</p> -->
                            <?php wp_nav_menu( [
                             'menu' => 'auto_azart', 
                             'menu_class' => 'dynamic-menu'
                            ] ); ?>
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