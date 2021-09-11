<?php 
/*
  * Template Name: Contact Page
  */ 
?>

<?php
$escContactHeader  = esc_html(get_field('contact_header'));
$contactText = get_field('contact_text');
$contactForm = get_field('contact_form_shortcode');
?>

<?php get_header(); ?>

<?php if (is_404()) : ?>
    <div class="error-block">
        <div class="error-block__inner">
            <?php the_field('404_message', 'options'); ?>
        </div>
    </div>
<?php else : ?>
    <main>
        <section class="contact container">
            <div class="contact__wrap">
                <div class="contact__image">
                    <?php the_post_thumbnail('', array('class' => 'contact__image-src')); ?>
                </div>
                <div class="contact__text">
                    <div class="contact__text-container">
                        <?php if ($escContactHeader) : ?>
                            <h1 class="contact__text-header"><?php echo $escContactHeader; ?></h1>
                        <?php endif; ?>
                        <?php if ($contactText) : ?>
                            <p><?php echo $contactText; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="contact__text-container">
                        <?php echo $contactForm; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>

<?php get_footer(); ?>