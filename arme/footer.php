
<?php wp_footer(); ?>

<footer class="bg-black text-center py-2">
        <div class="container">
            <div class="text-white-50 small">
                <?php echo get_theme_mod('footer_panel_title') ?>
                <!-- <a href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a href="#!">FAQ</a> -->
                <?php wp_nav_menu(
                    [

                        'theme_location' => 'footer',
                    ]
                );

                ?>
            </div>
        </div>
    </footer>
</body>
</html>