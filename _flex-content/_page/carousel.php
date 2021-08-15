<?php
    $hoverEffect = get_sub_field('hover_effect');
    $carousel = get_sub_field('carousel_shortcode');
?>
<section class="carousel">
    <div class="carousel__container<?php if ($hoverEffect === 'on') : ?> carousel__container--hover<?php endif; ?>">
        <?php echo $carousel; ?>
    </div>
</section>