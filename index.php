<?php get_header(); ?>

<?php if (is_404()):?>
    <div class="error-block">
        <div class="error-block__inner">
            <?php the_field('404_message', 'options'); ?>
        </div>
    </div>
<?php else: ?>
    <main>
        <?php get_template_part('_flex-content/_content'); ?>
    </main>
<?php endif; ?>

<?php get_footer(); ?>