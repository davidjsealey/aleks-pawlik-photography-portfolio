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
        <div class="about">
            <div class="about__wrap">
                <img src="" alt="" class="about__image">
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
        </div>
    </main>
<?php endif; ?>

<?php get_footer(); ?>