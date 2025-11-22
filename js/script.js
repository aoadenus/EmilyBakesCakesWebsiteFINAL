// ============================================================================
// EMILY BAKES CAKES - JAVASCRIPT WITH MOCK DATA
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
            if (mobileMenuBtn) {
                mobileMenuBtn.classList.remove('active');
            }
            navMenu.classList.remove('active');
        });
    });

    // Set active nav link based on current page
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});

// ============================================================================
// MENU TABS (Menu Page) - With Mock Data Population
// ============================================================================
function showTab(tabId) {
    // Hide all tabs
    const allTabs = document.querySelectorAll('.tab-content');
    allTabs.forEach(tab => {
        tab.classList.remove('active');
        tab.style.display = 'none';
    });
    
    // Remove active from all buttons
    const allButtons = document.querySelectorAll('.tab-btn');
    allButtons.forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
        selectedTab.style.display = 'block';
    }
    
    // Highlight clicked button - find the button that was clicked
    event.target.classList.add('active');
}

// ============================================================================
// POPULATE MENU WITH MOCK DATA
// ============================================================================
function populateMenu() {
    // Populate Standard Cakes
    const standardCakesTab = document.getElementById('standard-cakes');
    if (standardCakesTab && typeof mockData !== 'undefined') {
        const menuGrid = standardCakesTab.querySelector('.menu-grid');
        if (menuGrid && menuGrid.children.length > 0) {
            // Menu already has static content, keep it as is
        }
    }

    // Populate Cake Flavors
    const cakeFlavorTab = document.getElementById('cake-flavors');
    if (cakeFlavorTab && typeof mockData !== 'undefined') {
        const menuGrid = cakeFlavorTab.querySelector('.menu-grid');
        if (menuGrid) {
            menuGrid.innerHTML = mockData.cakeFlavors.map(flavor => 
                `<div class="menu-card">
                    <h3>${flavor.name}</h3>
                    <p>${flavor.description}</p>
                </div>`
            ).join('');
        }
    }

    // Populate Fillings
    const fillingsTab = document.getElementById('fillings');
    if (fillingsTab && typeof mockData !== 'undefined') {
        const menuGrid = fillingsTab.querySelector('.menu-grid');
        if (menuGrid) {
            menuGrid.innerHTML = mockData.fillings.map(filling => 
                `<div class="menu-card">
                    <h3>${filling.name}</h3>
                    <p>${filling.description}</p>
                </div>`
            ).join('');
        }
    }

    // Populate Icing Colors
    const icingColorsTab = document.getElementById('icing-colors');
    if (icingColorsTab && typeof mockData !== 'undefined') {
        let colorHTML = '';
        
        Object.entries(mockData.icingColors).forEach(([category, colors]) => {
            const categoryTitle = category.charAt(0).toUpperCase() + category.slice(1).replace(/([A-Z])/g, ' $1');
            colorHTML += `<h3 style="text-align: center; margin: ${colorHTML ? '3rem' : '0'} 0 2rem; color: #C44569;">${categoryTitle} Colors</h3>`;
            colorHTML += '<div class="color-grid">';
            colorHTML += colors.map(color => 
                `<div class="color-card">
                    <div class="color-swatch" style="background: ${color.hex}; ${color.hex === '#000000' ? 'border: 1px solid #E9E9E9;' : color.hex === '#FFFFFF' ? 'border: 1px solid #E9E9E9;' : ''}"></div>
                    <span>${color.name}</span>
                </div>`
            ).join('');
            colorHTML += '</div>';
        });
        
        icingColorsTab.innerHTML = colorHTML;
    }

    // Populate Icing Flavors
    const icingFlavorTab = document.getElementById('icing-flavors');
    if (icingFlavorTab && typeof mockData !== 'undefined') {
        const menuGrid = icingFlavorTab.querySelector('.menu-grid');
        if (menuGrid) {
            menuGrid.innerHTML = mockData.icingFlavors.map(flavor => 
                `<div class="menu-card">
                    <h3>${flavor.name}</h3>
                    <p>${flavor.description}</p>
                </div>`
            ).join('');
        }
    }

    // Populate Decorations
    const decorationsTab = document.getElementById('decorations');
    if (decorationsTab && typeof mockData !== 'undefined') {
        let decorationHTML = '<div class="decorations-list">';
        
        Object.entries(mockData.decorations).forEach(([category, items]) => {
            decorationHTML += `
                <div class="decoration-category">
                    <h3>${category}</h3>
                    <ul>
                        ${items.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                </div>
            `;
        });
        
        decorationHTML += '</div>';
        decorationsTab.innerHTML = decorationHTML;
    }
}

// Initialize menu population when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    populateMenu();
});

// ============================================================================
// SCROLL EFFECTS
// ============================================================================
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
});
