// Simple Offcanvas JavaScript - Debug Version
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM loaded, initializing offcanvas...');
  
  // Wait a bit for all elements to be ready
  setTimeout(function() {
    const offcanvas = document.getElementById('jp-offcanvas');
    const toggleBtn = document.getElementById('nav-expander');
    const closeBtn = document.getElementById('jp-offcanvas-close');
    const overlay = document.getElementById('jp-offcanvas-overlay');
    
    console.log('Found elements:', {
      offcanvas: !!offcanvas,
      toggleBtn: !!toggleBtn,
      closeBtn: !!closeBtn,
      overlay: !!overlay
    });
    
    if (!offcanvas) {
      console.error('Offcanvas element not found!');
      return;
    }
    
    // Open function
    function openOffcanvas() {
      console.log('Opening offcanvas...');
      offcanvas.classList.add('jp-active');
      if (overlay) overlay.classList.add('jp-active');
      document.body.style.overflow = 'hidden';
    }
    
    // Close function
    function closeOffcanvas() {
      console.log('Closing offcanvas...');
      offcanvas.classList.remove('jp-active');
      if (overlay) overlay.classList.remove('jp-active');
      document.body.style.overflow = '';
    }
    
    // Event listeners
    if (toggleBtn) {
      toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Toggle button clicked');
        openOffcanvas();
      });
    }
    
    if (closeBtn) {
      closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Close button clicked');
        closeOffcanvas();
      });
    }
    
    if (overlay) {
      overlay.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Overlay clicked');
        closeOffcanvas();
      });
    }
    
    // Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && offcanvas.classList.contains('jp-active')) {
        closeOffcanvas();
      }
    });
    
    // Navigation links
    const navLinks = document.querySelectorAll('.jp-offcanvas-nav a');
    navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        closeOffcanvas();
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
          setTimeout(() => {
            targetElement.scrollIntoView({ behavior: 'smooth' });
          }, 300);
        }
      });
    });
    
    console.log('Offcanvas initialized successfully!');
    
  }, 100);
});
