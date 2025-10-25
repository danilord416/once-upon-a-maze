<?php
/**
 * The main template file
 * This is the homepage template for Once Upon a Maze
 */

get_header(); ?>

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <?php 
                $logo_id = get_field('site_logo') ?: attachment_url_to_postid(get_template_directory_uri() . '/assets/Once-Upon-a Maze-Logo-2.png');
                if ($logo_id) {
                    echo wp_get_attachment_image($logo_id, 'full', false, array('class' => 'logo-img', 'alt' => 'Once Upon a Maze Logo'));
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/Once-Upon-a Maze-Logo-2.png" alt="Once Upon a Maze Logo" class="logo-img">';
                }
                ?>
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

<!-- Hero Section with Header Image -->
<section id="home" class="hero">
    <div class="hero-image-container">
        <?php 
        $hero_image = get_theme_mod('hero_image');
        if ($hero_image) {
            echo wp_get_attachment_image($hero_image, 'full', false, array('class' => 'hero-header-img', 'alt' => 'Once Upon a Maze'));
        } else {
            echo '<img src="' . get_template_directory_uri() . '/assets/Header-Image.png" alt="Once Upon a Maze" class="hero-header-img">';
        }
        ?>
    </div>
</section>

<!-- Main Content Section -->
<section class="main-content">
    <div class="container">
        <div class="content-header">
            <h1 class="content-title"><?php echo get_theme_mod('main_title', 'Every Twist Tells a Tale'); ?></h1>
            <p class="content-subtitle"><?php echo get_theme_mod('main_subtitle', 'Step into a living storybook, where magic winds through enchanted pathways & whimsical rooms as familiar tales come to life.'); ?></p>
            <div class="content-description">
                <p><?php echo get_theme_mod('main_description', 'Next door to FairyTale Village, this all-new walk-through experience invites you to wander, wonder, and rediscover your favorite childhood stories — one twist at a time.'); ?></p>
            </div>
            <div class="hero-buttons">
                <a href="<?php echo get_field('cta_button_url') ?: '#'; ?>" class="btn btn-primary">
                    <i class="fas fa-ticket-alt"></i>
                    <?php echo get_field('cta_button_text') ?: 'Reserve Your Adventure'; ?>
                </a>
                <p class="ticket-info"><?php echo get_field('ticket_info') ?: 'or visit us in person — tickets available online or at the door every 15 minutes!'; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- What Awaits Inside Section -->
<section class="what-awaits-section">
    <div class="container">
        <div class="story-header">
            <h2 class="section-title"><?php echo get_field('story_section_title') ?: 'What Awaits Inside'; ?></h2>
            <p class="story-intro"><?php echo get_field('story_section_intro') ?: 'Your journey begins with a choice: two paths, two beginnings, and endless possibilities within.'; ?></p>
        </div>
        
        <div class="story-grid">
            <?php
            $story_rooms = get_posts(array(
                'post_type' => 'story_rooms',
                'numberposts' => -1,
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($story_rooms) :
                foreach ($story_rooms as $room) :
                    $icon = get_field('room_icon', $room->ID) ?: '🏠';
                    $title = $room->post_title;
                    $description = $room->post_content;
            ?>
                <div class="story-card">
                    <div class="story-icon"><?php echo esc_html($icon); ?></div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo wp_kses_post($description); ?></p>
                </div>
            <?php 
                endforeach;
            else :
                // Fallback content if no story rooms are set up
                $default_rooms = array(
                    array('icon' => '🧜‍♀️', 'title' => 'Mermaid Lagoon', 'desc' => 'Wander into a world of shimmering seas and explore a whimsical pirate ship made just for kids.'),
                    array('icon' => '🏠', 'title' => 'Seven Dwarfs Cottage', 'desc' => 'Peek inside the cozy cottage and discover what the dwarfs have been up to!'),
                    array('icon' => '🍭', 'title' => 'The Land of Candy', 'desc' => 'A sugary wonderland where gumdrops, candy canes, and peppermint paths lead the way.'),
                    array('icon' => '🎩', 'title' => 'Mad Hatter\'s Mirrors', 'desc' => 'Lose yourself (and find your laughter) in a topsy-turvy world of reflections and riddles.'),
                    array('icon' => '🐉', 'title' => 'Dragon\'s Secret Garden', 'desc' => 'A mystical realm where imagination blooms and a dragon keeps watch over its hidden wonders.'),
                    array('icon' => '👗', 'title' => 'Through the Wardrobe', 'desc' => 'Step through to another world, where tiny treasures and classic fairytale icons await.'),
                );
                
                foreach ($default_rooms as $room) :
            ?>
                <div class="story-card">
                    <div class="story-icon"><?php echo esc_html($room['icon']); ?></div>
                    <h3><?php echo esc_html($room['title']); ?></h3>
                    <p><?php echo esc_html($room['desc']); ?></p>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
        
        <div class="story-conclusion">
            <div class="magical-border">
                <p class="story-ending"><?php echo get_field('story_conclusion') ?: 'Each twist of the maze reveals a new world to explore — part storybook, part adventure, all magic.'; ?></p>
                <div class="duration-badge">
                    <i class="fas fa-clock"></i>
                    <span><?php echo get_field('duration_info') ?: 'The full experience lasts 30–60 minutes depending on your curiosity and courage!'; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Plan Your Visit Section -->
<section class="plan-visit-section">
    <div class="container">
        <div class="plan-visit-header">
            <h2 class="section-title"><?php echo get_field('visit_section_title') ?: 'Plan Your Visit'; ?></h2>
        </div>
        
        <div class="experience-grid-top">
            <div class="experience-card">
                <div class="experience-icon">⏰</div>
                <h3><?php echo get_field('timed_entry_title') ?: 'Timed Entry'; ?></h3>
                <p><?php echo get_field('timed_entry_desc') ?: 'Every 15 minutes for a smooth experience'; ?></p>
            </div>
            
            <div class="experience-card">
                <div class="experience-icon">🎟️</div>
                <h3><?php echo get_field('booking_title') ?: 'Easy Booking'; ?></h3>
                <p><?php echo get_field('booking_desc') ?: 'Tickets available online or at the door'; ?></p>
            </div>
            
            <div class="experience-card">
                <div class="experience-icon">👨‍👩‍👧‍👦</div>
                <h3><?php echo get_field('audience_title') ?: 'Perfect for Everyone'; ?></h3>
                <p><?php echo get_field('audience_desc') ?: 'Children, families, friends, and anyone who believes in magic'; ?></p>
            </div>
        </div>
        
        <div class="experience-grid-bottom">
            <div class="experience-card">
                <div class="experience-icon">📍</div>
                <h3><?php echo get_field('location_title') ?: 'Great Location'; ?></h3>
                <p><?php echo get_field('location_desc') ?: 'Inside North Point Mall, Alpharetta, GA<br>Next to FairyTale Village on the 2nd floor'; ?></p>
            </div>
            
            <div class="experience-card">
                <div class="experience-icon">🚗</div>
                <h3><?php echo get_field('parking_title') ?: 'Free Parking'; ?></h3>
                <p><?php echo get_field('parking_desc') ?: 'Free parking and easy access from the parking garage mall entrance'; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Party Celebration Section -->
<section class="party-section">
    <div class="container">
        <div class="party-header">
            <h2 class="section-title"><?php echo get_field('party_section_title') ?: 'Celebrate in Storybook Style'; ?></h2>
            <p class="section-subtitle"><?php echo get_field('party_section_subtitle') ?: 'Host your next birthday or special event inside our enchanting party rooms!'; ?></p>
            <p class="party-excitement"><?php echo get_field('party_excitement') ?: 'Make your special day truly magical with our unforgettable party experiences!'; ?></p>
        </div>
        
        <div class="party-rooms">
            <?php
            $party_rooms = get_posts(array(
                'post_type' => 'party_rooms',
                'numberposts' => -1,
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($party_rooms) :
                foreach ($party_rooms as $room) :
                    $icon = get_field('party_room_icon', $room->ID) ?: '🧚‍♀️';
                    $title = $room->post_title;
                    $description = $room->post_content;
            ?>
                <div class="party-room">
                    <div class="party-icon"><?php echo esc_html($icon); ?></div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo wp_kses_post($description); ?></p>
                </div>
            <?php 
                endforeach;
            else :
                // Fallback content
            ?>
                <div class="party-room">
                    <div class="party-icon">🧚‍♀️</div>
                    <h3>The Fairy Room</h3>
                    <p>Full of sparkle, flowers, and woodland charm</p>
                </div>
                
                <div class="party-room">
                    <div class="party-icon">🐉</div>
                    <h3>The Dragon Room</h3>
                    <p>Bold, mystical, and full of adventure</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="party-cta">
            <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-white">
                <i class="fas fa-birthday-cake"></i>
                <?php echo get_field('party_cta_text') ?: 'Inquire About Parties'; ?>
            </a>
        </div>
    </div>
</section>

<!-- Gift Shop -->
<section class="gift-shop">
    <div class="container">
        <div class="gift-shop-header">
            <div class="gift-shop-emoji">🛍️</div>
            <h2 class="section-title"><?php echo get_field('gift_shop_title') ?: 'The Whimsical Gift Shop'; ?></h2>
        </div>
        
        <p class="gift-shop-text"><?php echo get_field('gift_shop_description') ?: 'Before you leave, stop by our charming gift shop filled with treasures inspired by your favorite stories.<br>Take a piece of the maze home and keep the magic alive.'; ?></p>
    </div>
</section>

<?php get_footer(); ?>
