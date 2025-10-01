// Modern Offcanvas JavaScript - JP Redesign
document.addEventListener('DOMContentLoaded', function() {
  
  // Elements - menggunakan selector yang kompatibel
  const offcanvas = document.getElementById('jp-offcanvas');
  const offcanvasToggle = document.getElementById('nav-expander'); // Button hamburger yang sudah ada
  const offcanvasClose = document.getElementById('jp-offcanvas-close');
  const overlay = document.getElementById('jp-offcanvas-overlay');
  const navLinks = document.querySelectorAll('.jp-offcanvas-nav a');
  
  // Debug: Log elements untuk memastikan mereka ditemukan
  console.log('Offcanvas elements:', {
    offcanvas: offcanvas,
    offcanvasToggle: offcanvasToggle,
    offcanvasClose: offcanvasClose,
    overlay: overlay
  });
  
  // Open offcanvas
  function openOffcanvas() {
    if (!offcanvas) return;
    
    offcanvas.classList.add('jp-active');
    if (overlay) overlay.classList.add('jp-active');
    document.body.style.overflow = 'hidden';
    
    // Add entrance animation to content
    const contentElements = offcanvas.querySelectorAll('.jp-offcanvas-description, .jp-offcanvas-nav, .jp-offcanvas-contact, .jp-offcanvas-social');
    contentElements.forEach((el, index) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
      
      setTimeout(() => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      }, 100 + (index * 100));
    });
  }
  
  // Close offcanvas
  function closeOffcanvas() {
    if (!offcanvas) return;
    
    offcanvas.classList.remove('jp-active');
    if (overlay) overlay.classList.remove('jp-active');
    document.body.style.overflow = '';
    
    // Reset content animations
    const contentElements = offcanvas.querySelectorAll('.jp-offcanvas-description, .jp-offcanvas-nav, .jp-offcanvas-contact, .jp-offcanvas-social');
    contentElements.forEach(el => {
      el.style.opacity = '';
      el.style.transform = '';
      el.style.transition = '';
    });
  }
  
  // Event listeners dengan error handling
  if (offcanvasToggle) {
    offcanvasToggle.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Toggle clicked');
      openOffcanvas();
    });
  } else {
    console.warn('Offcanvas toggle button not found');
  }
  
  if (offcanvasClose) {
    offcanvasClose.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Close clicked');
      closeOffcanvas();
    });
  } else {
    console.warn('Offcanvas close button not found');
  }
  
  if (overlay) {
    overlay.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Overlay clicked');
      closeOffcanvas();
    });
  }
  
  // Close on escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && offcanvas && offcanvas.classList.contains('jp-active')) {
      closeOffcanvas();
    }
  });
  
  // Smooth scrolling for navigation links
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        closeOffcanvas();
        
        setTimeout(() => {
          const headerHeight = document.querySelector('.full-width-header')?.offsetHeight || 0;
          const targetPosition = targetElement.offsetTop - headerHeight;
          
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }, 300);
      }
    });
  });
  
  // Active menu highlighting
  const sections = document.querySelectorAll('section[id]');
  
  function updateActiveMenu() {
    const scrollPos = window.scrollY + 200;
    
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      const sectionId = section.getAttribute('id');
      
      if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
        navLinks.forEach(link => {
          link.classList.remove('jp-active');
          if (link.getAttribute('href') === '#' + sectionId) {
            link.classList.add('jp-active');
          }
        });
      }
    });
  }
  
  window.addEventListener('scroll', function() {
    let ticking = false;
    if (!ticking) {
      requestAnimationFrame(updateActiveMenu);
      ticking = true;
    }
    setTimeout(() => ticking = false, 16);
  });
  
  // Handle window resize
  window.addEventListener('resize', function() {
    if (window.innerWidth > 991.98 && offcanvas && offcanvas.classList.contains('jp-active')) {
      closeOffcanvas();
    }
  });
  
  // Add hover effects for social links
  const socialLinks = document.querySelectorAll('.jp-offcanvas-social a');
  socialLinks.forEach(link => {
    link.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-3px) scale(1.1)';
    });
    
    link.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(-3px) scale(1)';
    });
  });
  
  // Initialize offcanvas styling
  if (offcanvas) {
    offcanvas.style.opacity = '0';
    offcanvas.style.transform = 'translateX(100%)';
    offcanvas.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    
    setTimeout(() => {
      offcanvas.style.opacity = '1';
      offcanvas.style.transform = 'translateX(0)';
    }, 100);
  }
  
  console.log('Modern offcanvas initialized');
});
