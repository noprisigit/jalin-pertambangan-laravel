// Portfolio Animation JavaScript
document.addEventListener('DOMContentLoaded', function() {
  
  // Intersection Observer for portfolio animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const portfolioItems = entry.target.querySelectorAll('.portfolio-item');
        portfolioItems.forEach((item, index) => {
          setTimeout(() => {
            item.classList.add('jp-animate');
          }, index * 100);
        });
      }
    });
  }, observerOptions);
  
  // Observe portfolio section
  const portfolioSection = document.querySelector('.jp-portfolio-section');
  if (portfolioSection) {
    observer.observe(portfolioSection);
  }
  
  // Enhanced hover effects
  const portfolioItems = document.querySelectorAll('.jp-portfolio-section .portfolio-item');
  portfolioItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    item.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });
});
