// ============================================================================
// EMILY BAKES CAKES - MAIN JAVASCRIPT
// Pure vanilla JavaScript for interactivity
// ============================================================================

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navMenu = document.getElementById('navMenu');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking on a link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenuBtn.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });
    
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
});

// ============================================================================
// CAROUSEL FUNCTIONALITY (Homepage)
// ============================================================================
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const totalSlides = slides.length;

function showSlide(index) {
    // Remove active class from all slides
    slides.forEach(slide => {
        slide.classList.remove('active');
    });
    
    // Add active class to current slide
    if (slides[index]) {
        slides[index].classList.add('active');
    }
}

function moveSlide(direction) {
    currentSlide += direction;
    
    // Loop around
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    
    showSlide(currentSlide);
}

// Auto-advance carousel every 10 seconds
if (totalSlides > 0) {
    setInterval(function() {
        moveSlide(1);
    }, 10000);
}

// ============================================================================
// MENU TABS FUNCTIONALITY (Menu Page)
// ============================================================================
function showTab(tabId) {
    // Hide all tab content
    const allTabs = document.querySelectorAll('.tab-content');
    allTabs.forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Remove active class from all buttons
    const allButtons = document.querySelectorAll('.tab-btn');
    allButtons.forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Add active class to clicked button (use window.event for inline onclick)
    const clickedButton = window.event ? window.event.target : null;
    if (clickedButton && clickedButton.classList.contains('tab-btn')) {
        clickedButton.classList.add('active');
    }
}

// ============================================================================
// FORM VALIDATION (if needed for contact forms)
// ============================================================================
function validateContactForm() {
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const message = document.getElementById('message');
    
    if (!name || !email || !message) return true;
    
    if (name.value.trim() === '') {
        alert('Please enter your name');
        return false;
    }
    
    if (email.value.trim() === '') {
        alert('Please enter your email');
        return false;
    }
    
    if (!email.value.includes('@')) {
        alert('Please enter a valid email address');
        return false;
    }
    
    if (message.value.trim() === '') {
        alert('Please enter a message');
        return false;
    }
    
    return true;
}

// ============================================================================
// SMOOTH SCROLL
// ============================================================================
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
