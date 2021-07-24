<?php /* Template Name: Contact Template */ ?>

<?php
    $escAboutHeader  = esc_html(get_field('about_me_header'));
    $aboutText  = get_field('about_me_text');
    $email = esc_html(get_field('email_address'));
?>

<?php get_header(); ?>

<?php if (is_404()):?>
    <div class="error-block">
        <div class="error-block__inner">
            <?php the_field('404_message', 'options'); ?>
        </div>
    </div>
<?php else: ?>
    <main>
        <section class="about container">
            <div class="about__wrap">
                <div class="about__image">
                    <?php the_post_thumbnail('', array('class' => 'about__image-src')); ?>
                </div>
                <div class="about__text">
                    <?php if ($aboutText) : ?>
                        <div class="about__text-container">
                            <?php if ($escAboutHeader) : ?>
                                <h1 class="about__text-header"><?php echo $escAboutHeader; ?></h1>
                            <?php endif; ?>
                            <p><?php echo $aboutText; ?></p>
                        </div>
                    <?php endif; ?>
                    <!-- TODO: Contact Form -->
                    <div class="about__text-container">
                        CONTACT FORM
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>

<?php get_footer(); ?>