                <form action="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" kesh="77" placeholder="Поиск" required>
                    <button>Найти</button>
                </form>