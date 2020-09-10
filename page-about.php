<?php /* Template Name: About Template */ ?>

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
                    <img src="/wp-content/themes/aleks-pawlik-photography-portfolio/images/placeholder-about.jpg" alt="Aleks Pawlik" class="about__image-src">
                </div>
                <div class="about__text">
                    <div class="about__text-container">
                        <h1 class="about__text-header">About me</h1>
                        <p>Hi, this is your pal, Al.</p>
                    </div>
                    <div class="about__text-container">
                        <h2 class="about__text-header">Contact me</h2>
                        <a href="mailto:test@test.com" class="about__email">test@test.com</a>
                        <ul class="about__socials">
                            <li class="about__socials-items">
                                <a href="" class="about__socials-anchor">
                                    facebook
                                    <svg class="about__socials-icon"></svg>
                                </a>
                            </li>
                            <li class="about__socials-items">
                                <a href="" class="about__socials-anchor">
                                    instagram
                                    <svg class="about__socials-icon"></svg>
                                </a>
                            </li>
                            <li class="about__socials-items">
                                <a href="" class="about__socials-anchor">
                                    pinterest
                                    <svg class="about__socials-icon"></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>

<?php get_footer(); ?>