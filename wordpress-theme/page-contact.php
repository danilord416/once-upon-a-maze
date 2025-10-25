<?php
/**
 * Template Name: Contact Page
 * Contact page template for Once Upon a Maze
 */

get_header(); ?>

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/Once-Upon-a Maze-Logo-2.png" alt="Once Upon a Maze Logo" class="logo-img">
            <?php endif; ?>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => false,
            'fallback_cb' => 'once_upon_a_maze_fallback_menu',
        ));
        ?>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="page-hero">
    <div class="hero-image-container">
        <?php 
        $contact_hero = get_field('contact_hero_image') ?: get_template_directory_uri() . '/assets/Contact-Us-Header.png';
        ?>
        <img src="<?php echo esc_url($contact_hero); ?>" alt="Contact Us Header" class="hero-header-img">
    </div>
</section>

<!-- Contact Form -->
<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-container">
            <h2 class="section-title"><?php echo get_field('contact_form_title') ?: 'Get In Touch'; ?></h2>
            <p class="section-subtitle" style="text-align: center;"><?php echo get_field('contact_form_subtitle') ?: 'Have a question or want to book a party? We\'d love to hear from you!'; ?></p>
            
            <?php if (isset($_GET['contact']) && $_GET['contact'] == 'success') : ?>
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; text-align: center;">
                    <i class="fas fa-check-circle"></i> Thank you! We'll get back to you soon.
                </div>
            <?php elseif (isset($_GET['contact']) && $_GET['contact'] == 'error') : ?>
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; text-align: center;">
                    <i class="fas fa-exclamation-triangle"></i> Sorry, there was an error sending your message. Please try again.
                </div>
            <?php endif; ?>
            
            <form class="contact-form" method="post" action="">
                <div class="form-group">
                    <label for="contact_name">Name *</label>
                    <input type="text" id="contact_name" name="contact_name" required>
                </div>
                
                <div class="form-group">
                    <label for="contact_email">Email *</label>
                    <input type="email" id="contact_email" name="contact_email" required>
                </div>
                
                <div class="form-group">
                    <label for="contact_message">Your Inquiry *</label>
                    <textarea id="contact_message" name="contact_message" rows="5" required placeholder="Tell us about your question, party booking request, or any other inquiry..."></textarea>
                </div>
                
                <div style="text-align: center;">
                    <button type="submit" name="contact_form_submit" class="btn btn-primary btn-large">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="contact-info">
    <div class="container">
        <div class="contact-grid">
            <!-- Location Card -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Visit Us</h3>
                <div class="contact-details">
                    <p><strong>Once Upon a Maze</strong></p>
                    <p><?php echo get_theme_option('business_address', '1000 North Point Cir'); ?></p>
                    <p><?php echo get_field('location_details') ?: 'Alpharetta, GA 30022'; ?></p>
                    <p><?php echo get_field('location_floor') ?: '2nd Floor, next to FairyTale Village'; ?></p>
                </div>
                <div class="contact-extra">
                    <p><i class="fas fa-parking"></i> Free parking available</p>
                    <p><i class="fas fa-wheelchair"></i> Wheelchair accessible</p>
                    <p><i class="fas fa-car"></i> Easy access from parking garage</p>
                </div>
            </div>

            <!-- Hours Card -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Operating Hours</h3>
                <div class="contact-details">
                    <?php 
                    $hours = get_field('operating_hours');
                    if ($hours) :
                        foreach ($hours as $hour) :
                    ?>
                        <div class="hours-row">
                            <span class="day"><?php echo esc_html($hour['day']); ?></span>
                            <span class="time"><?php echo esc_html($hour['time']); ?></span>
                        </div>
                    <?php 
                        endforeach;
                    else :
                    ?>
                        <div class="hours-row">
                            <span class="day">Fridays</span>
                            <span class="time">10:00 AM - 9:00 PM</span>
                        </div>
                        <div class="hours-row">
                            <span class="day">Saturdays</span>
                            <span class="time">10:00 AM - 9:00 PM</span>
                        </div>
                        <div class="hours-row">
                            <span class="day">Sundays</span>
                            <span class="time">12:00 PM - 7:00 PM</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="contact-extra">
                    <p><i class="fas fa-ticket-alt"></i> Tickets available every 15 minutes</p>
                    <p><i class="fas fa-door-open"></i> Walk-ins welcome</p>
                </div>
            </div>

            <!-- Contact Methods Card -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Contact Us</h3>
                <div class="contact-details">
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <span><a href="mailto:<?php echo get_theme_option('contact_email', 'onceuponamaze@gmail.com'); ?>"><?php echo get_theme_option('contact_email', 'onceuponamaze@gmail.com'); ?></a></span>
                    </div>
                </div>
                <div class="contact-extra">
                    <p><i class="fas fa-clock"></i> Response within 24 hours</p>
                    <p><i class="fas fa-heart"></i> We love hearing from you!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

