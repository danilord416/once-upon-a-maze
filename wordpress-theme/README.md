# Once Upon a Maze WordPress Theme

A magical WordPress theme for the Once Upon a Maze attraction website.

## Features

- **Custom Post Types**: Story Rooms and Party Rooms
- **Advanced Custom Fields (ACF)**: Easy content management
- **Responsive Design**: Mobile-friendly layout
- **Custom Contact Form**: Built-in contact form with email functionality
- **Social Media Integration**: Configurable social media links
- **Customizer Options**: Easy theme customization through WordPress Customizer

## Installation

1. **Upload Theme Files**
   - Upload the entire `wordpress-theme` folder to `/wp-content/themes/`
   - Rename the folder to `once-upon-a-maze`

2. **Install Required Plugins**
   - Advanced Custom Fields (ACF) - Required for content management
   - Contact Form 7 (Optional) - For advanced form features

3. **Activate Theme**
   - Go to Appearance > Themes in WordPress admin
   - Activate "Once Upon a Maze" theme

4. **Import ACF Fields**
   - Go to Custom Fields > Tools
   - Import the `acf-fields.json` file

5. **Upload Images**
   - Upload all images from the `assets` folder to WordPress Media Library
   - Update image paths in the theme files if needed

## Content Management

### Homepage Content
- Edit homepage content through the page editor
- Use ACF fields to customize:
  - Hero image
  - Main title and subtitle
  - Story section content
  - Party room information
  - Contact details

### Story Rooms
- Go to Story Rooms in WordPress admin
- Add/edit story rooms with:
  - Room icon (emoji)
  - Room title
  - Room description

### Party Rooms
- Go to Party Rooms in WordPress admin
- Add/edit party rooms with:
  - Room icon (emoji)
  - Room title
  - Room description

### Contact Information
- Go to Appearance > Customize > Contact Information
- Update:
  - Contact email
  - Business address
  - Social media URLs

## Customization

### Colors and Fonts
- All styling is in `style.css`
- Uses Google Fonts: Poppins and Crimson Text
- Custom CSS can be added through WordPress Customizer

### Images
- Logo: Upload through Appearance > Customize > Site Identity
- Hero images: Manage through ACF fields
- Background images: Update paths in `style.css`

## File Structure

```
wordpress-theme/
├── style.css          # Main stylesheet with theme header
├── functions.php      # Theme functions and setup
├── index.php          # Homepage template
├── page-contact.php   # Contact page template
├── header.php         # Header template
├── footer.php         # Footer template
├── js/
│   └── script.js      # JavaScript functionality
├── acf-fields.json    # ACF field configurations
└── README.md          # This file
```

## Support

For theme support and customization, contact your developer.

## Version

Version 1.0 - Initial release

