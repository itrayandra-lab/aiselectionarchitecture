// Custom JavaScript untuk integrasi Laravel dengan template BeautyZone

document.addEventListener('DOMContentLoaded', function() {
    // Hide loading screen
    setTimeout(function() {
        document.body.classList.add('loaded');
    }, 1000);

    // Scroll to top functionality
    const scrollTopBtn = document.querySelector('.scroltop');
    
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.display = 'block';
            } else {
                scrollTopBtn.style.display = 'none';
            }
        });

        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Mobile navigation toggle
    const navToggle = document.querySelector('.navbar-toggler');
    const navMenu = document.querySelector('.Navigationbar');
    
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('max-lg:left-[-300px]');
            navMenu.classList.toggle('max-lg:left-0');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.add('max-lg:left-[-300px]');
                navMenu.classList.remove('max-lg:left-0');
            }
        });
    }

    // Newsletter subscription
    const subscribeForm = document.querySelector('.dzSubscribe');
    if (subscribeForm) {
        subscribeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[name="email"]').value;
            const messageDiv = this.querySelector('.dzSubscribeMsg');
            
            if (email) {
                messageDiv.innerHTML = '<div class="alert alert-success">Thank you for subscribing!</div>';
                this.querySelector('input[name="email"]').value = '';
            } else {
                messageDiv.innerHTML = '<div class="alert alert-danger">Please enter a valid email address.</div>';
            }
        });
    }
});