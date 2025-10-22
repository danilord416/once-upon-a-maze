// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);

    // Observe elements for scroll animations
    document.querySelectorAll('.story-card, .experience-card, .party-room, .contact-card').forEach(el => {
        observer.observe(el);
    });

    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            // Simple validation
            if (email && email.includes('@')) {
                // Show success message (in a real implementation, you'd send this to your server)
                const button = this.querySelector('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                button.style.background = '#28a745';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    this.reset();
                }, 3000);
            }
        });
    }

    // Contact form submission
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = this.querySelector('#name').value;
            const email = this.querySelector('#email').value;
            const inquiry = this.querySelector('#inquiry').value;
            
            // Simple validation
            if (name && email && email.includes('@') && inquiry) {
                // Show success message (in a real implementation, you'd send this to your server)
                const button = this.querySelector('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
                button.style.background = '#28a745';
                
                // Show success message
                const successMessage = document.createElement('div');
                successMessage.style.cssText = `
                    background: #d4edda;
                    color: #155724;
                    padding: 1rem;
                    border-radius: 10px;
                    margin-top: 1rem;
                    text-align: center;
                    border: 1px solid #c3e6cb;
                `;
                successMessage.innerHTML = '<i class="fas fa-check-circle"></i> Thank you! We\'ll get back to you soon.';
                
                this.appendChild(successMessage);
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    successMessage.remove();
                    this.reset();
                }, 5000);
            } else {
                // Show error message
                const errorMessage = document.createElement('div');
                errorMessage.style.cssText = `
                    background: #f8d7da;
                    color: #721c24;
                    padding: 1rem;
                    border-radius: 10px;
                    margin-top: 1rem;
                    text-align: center;
                    border: 1px solid #f5c6cb;
                `;
                errorMessage.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Please fill in all required fields.';
                
                // Remove any existing error messages
                const existingError = this.querySelector('.error-message');
                if (existingError) existingError.remove();
                
                errorMessage.classList.add('error-message');
                this.appendChild(errorMessage);
                
                setTimeout(() => {
                    errorMessage.remove();
                }, 5000);
            }
        });
    }

    // Parallax effect for castle background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const castle = document.querySelector('.castle-silhouette');
        
        if (castle) {
            const rate = scrolled * -0.5;
            castle.style.transform = `translateY(${rate}px) scale(1)`;
        }
    });

    // Add floating animation to storybook elements
    const floatingElements = document.querySelectorAll('.floating-candy, .yellow-brick-road');
    floatingElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.5}s`;
    });

    // Add hover effects to story cards
    document.querySelectorAll('.story-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) rotate(1deg) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotate(0deg) scale(1)';
        });
    });

    // Add click effects to buttons
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    .btn {
        position: relative;
        overflow: hidden;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .hamburger.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }
    
    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }
    
    .hamburger.active span:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }
`;
document.head.appendChild(style);

