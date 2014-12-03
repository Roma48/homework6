<div class="wrap">
    <h2>Arzamath</h2>
    <form method="post" multiple action="options.php" name="myform" id="my">
        <?php @settings_fields('wp_plugin_template-group'); ?>
        <?php @do_settings_fields('wp_plugin_template-group'); ?>

        <?php do_settings_sections('wp_plugin_template'); ?>

        <?php @submit_button(); ?>
    </form>
</div>