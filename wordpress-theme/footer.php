<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-info">
                <div class="footer-section">
                    <h4>Location</h4>
                    <p><?php echo get_theme_option('business_address', '1000 North Point Cir'); ?><br><?php echo get_field('location_city_state') ?: 'Alpharetta, GA 30022'; ?></p>
                    <p><?php echo get_field('location_floor') ?: '2nd Floor, next to FairyTale Village'; ?></p>
                </div>
                
                <div class="footer-section">
                    <h4>Contact Us</h4>
                    <p><a href="mailto:<?php echo get_theme_option('contact_email', 'onceuponamaze@gmail.com'); ?>"><?php echo get_theme_option('contact_email', 'onceuponamaze@gmail.com'); ?></a></p>
                </div>
                
                <div class="footer-section">
                    <h4>Join the Story</h4>
                    <p>Follow the magic as it unfolds!</p>
                    <div class="social-links">
                        <?php if (get_theme_option('facebook_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_option('facebook_url')); ?>" class="social-link" target="_blank"><i class="fab fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (get_theme_option('instagram_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_option('instagram_url')); ?>" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if (get_theme_option('tiktok_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_option('tiktok_url')); ?>" class="social-link" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo get_field('newsletter_signup_url') ?: '#'; ?>" class="btn btn-white btn-small">
                        <i class="fas fa-envelope"></i>
                        <?php echo get_field('newsletter_button_text') ?: 'Join Our Storybook List'; ?>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Once-Upon-a Maze-Logo-2.png" alt="Once Upon a Maze Logo" class="footer-logo-small">
                <?php endif; ?>
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

