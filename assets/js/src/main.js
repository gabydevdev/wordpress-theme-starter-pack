// Import Bootstrap and block utilities
import 'bootstrap';
import { initBlocks } from './blocks/utils';

// Initialize animations for blocks with .has-animation class
const initBlockAnimations = () => {
  const animatedBlocks = document.querySelectorAll('.has-animation');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
      }
    });
  }, {
    threshold: 0.2
  });

  animatedBlocks.forEach(block => observer.observe(block));
};

// Initialize all functionality when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  initBlocks();
  initBlockAnimations();
});
