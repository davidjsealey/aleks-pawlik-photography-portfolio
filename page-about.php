<?php /* Template Name: About Template */ ?>

<?php
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
                            <h1 class="about__text-header">About me</h1>
                            <p><?php echo $aboutText; ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="about__text-container">
                        <h2 class="about__text-header about__text-header--sm">Contact me</h2>
                        <?php if ($email) : ?>
                            <a href="mailto:<?php echo $email; ?>" class="about__email"><?php echo $email; ?></a>
                        <?php endif; ?>
                        <?php if (have_rows('social_media_links')) : ?>
                            <ul class="about__socials">
                                <?php while (have_rows('social_media_links')) : the_row(); ?>
                                    <?php
                                    $escSocialURL = esc_url(get_sub_field('social_media_link'));
                                    $escSocialPlatform = esc_html(get_sub_field('social_media_platform'));
                                    ?>
                                    <li class="about__socials-items">
                                        <a href="<?php echo $escSocialURL; ?>" target="_blank" rel="noopener" aria-label="Follow Aleks Pawlik on <?php echo $escSocialPlatform; ?>" class="about__socials-anchor" aria-label="<?php echo $escSocialPlatform; ?>">
                                            <svg class="about__socials-icon">
                                                <use xlink:href="#sprite-<?php echo $escSocialPlatform; ?>"></use>
                                            </svg>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>

<?php get_footer(); ?>