// Skillbar Animation JavaScript
document.addEventListener('DOMContentLoaded', function() {
  
  // Intersection Observer for skillbar animations
  const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const skillbars = entry.target.querySelectorAll('.skillbar');
        skillbars.forEach(skillbar => {
          const percent = skillbar.getAttribute('data-percent');
          const skillbarBar = skillbar.querySelector('.skillbar-bar');
          
          setTimeout(() => {
            skillbarBar.style.width = percent + '%';
          }, 500);
        });
      }
    });
  }, observerOptions);
  
  // Observe skillbar section
  const skillbarSection = document.querySelector('.jp-skillbar-section');
  if (skillbarSection) {
    observer.observe(skillbarSection);
  }
});
