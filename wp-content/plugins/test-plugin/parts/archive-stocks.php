<?php
$the_query = new WP_Query( $args );
$variants = get_field_object('field_649d25300164a');
?>
<div id="tp_stock_variant_filter">
    <form method="GET" onsubmit="return false;">
        <select name="stock_type">
            <option value="">-Select variant-</option>
            <?php foreach ($variants['choices'] as $key => $name) { ?>
            <option <?php if ($_GET['stock_type'] == $key) echo 'selected'; ?> value="<?php echo $key ?>"><?php echo $name ?></option>
            <?php } ?>
        </select>
    </form>
</div>
<div id="stock-content">
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <h4><?php the_title(); ?></h4>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
    <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>