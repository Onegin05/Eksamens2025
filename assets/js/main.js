// Main JavaScript functionality for ZaļāAugsme

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Contact modal functionality
    const contactBtn = document.getElementById('contact-btn');
    const contactModal = document.getElementById('contact-modal');
    const closeModalBtn = document.getElementById('close-modal');
    const cancelBtn = document.getElementById('cancel-btn');
    const contactForm = document.getElementById('contact-form');

    if (contactBtn && contactModal) {
        contactBtn.addEventListener('click', function() {
            contactModal.classList.remove('hidden');
        });
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function() {
            contactModal.classList.add('hidden');
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            contactModal.classList.add('hidden');
        });
    }

    // Close modal when clicking outside
    if (contactModal) {
        contactModal.addEventListener('click', function(e) {
            if (e.target === contactModal) {
                contactModal.classList.add('hidden');
            }
        });
    }

    // Contact form submission
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm(this)) {
                alert('Lūdzu, aizpildiet visus obligātos laukus un pārliecinieties, ka e-pasta adrese ir pareiza.');
                return;
            }
            
            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            
            // Disable submit button and show loading state
            submitButton.disabled = true;
            submitButton.textContent = 'Nosūta...';
            
            // Get form data
            const formData = {
                name: this.name.value.trim(),
                email: this.email.value.trim(),
                message: this.message.value.trim()
            };
            
            console.log('Sending form data:', formData); // Debug log
            
            // Send data to API
            fetch('api/contact/send.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                console.log('Response status:', response.status); // Debug log
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data); // Debug log
                if (data.success) {
                    // Show success message
                    alert('Paldies! Jūsu ziņa ir nosūtīta. Mēs ar jums sazināsimies pēc iespējas ātrāk.');
                    contactModal.classList.add('hidden');
                    contactForm.reset();
                } else {
                    // Show error message
                    alert(data.error || 'Kļūda nosūtot ziņu. Lūdzu, mēģiniet vēlreiz.');
                }
            })
            .catch(error => {
                console.error('Error:', error); // Debug log
                // Show error message
                alert('Kļūda nosūtot ziņu. Lūdzu, mēģiniet vēlreiz.');
            })
            .finally(() => {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            });
        });
    }

    // Money tree animation
    initMoneyTreeAnimation();
});

// Money tree animation function
function initMoneyTreeAnimation() {
    const container = document.getElementById('money-tree-animation');
    if (!container) return;

    function createMoneyLeaf() {
        const leaf = document.createElement('div');
        const size = Math.random() * 20 + 10; // Random size between 10-30px
        
        leaf.className = 'money-leaf';
        leaf.style.width = `${size}px`;
        leaf.style.height = `${size * 0.5}px`;
        leaf.style.left = `${Math.random() * 100}%`;
        leaf.style.top = '-20px';
        leaf.textContent = '€';
        
        container.appendChild(leaf);
        
        // Animate the leaf falling
        let position = -20;
        const speed = Math.random() * 2 + 1;
        const rotation = Math.random() * 360;
        
        const animation = setInterval(() => {
            position += speed;
            leaf.style.top = position + 'px';
            leaf.style.transform = `rotate(${rotation + position}deg)`;
            leaf.style.opacity = Math.max(0, 0.7 - position / 400);
            
            if (position > container.clientHeight) {
                clearInterval(animation);
                if (leaf.parentNode) {
                    leaf.parentNode.removeChild(leaf);
                }
            }
        }, 50);
    }
    
    // Create leaves at intervals
    setInterval(createMoneyLeaf, 800);
}

// Utility function for currency formatting
function formatCurrency(amount, currency = 'EUR') {
    return new Intl.NumberFormat('lv-LV', {
        style: 'currency',
        currency: currency,
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(amount);
}

// Utility function for smooth scrolling
function smoothScrollTo(target) {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Form validation utilities
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validateForm(formElement) {
    const inputs = formElement.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('border-red-500');
        } else {
            input.classList.remove('border-red-500');
        }
        
        if (input.type === 'email' && !validateEmail(input.value)) {
            isValid = false;
            input.classList.add('border-red-500');
        }
    });
    
    return isValid;
}

// Export functions for use in other files
window.ZalaAugsme = {
    formatCurrency,
    smoothScrollTo,
    validateEmail,
    validateForm
};
