/**
 * Header component functionality
 */
class Header {
  constructor() {
    this.init();
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    // Wait for DOM to be ready
    jQuery.ready(() => {
      const menuToggle = document.querySelector('.menu-toggle');
      if (menuToggle) {
        menuToggle.addEventListener('click', this.handleMenuToggle.bind(this));
      }
    });
  }

  handleMenuToggle(event) {
    const menuToggle = event.currentTarget;
    const navigation = menuToggle.closest('.main-navigation');
    
    if (navigation) {
      navigation.classList.toggle('toggled');
      menuToggle.setAttribute('aria-expanded', 
        menuToggle.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
      );
    }
  }
}

// Initialize header component
export default new Header(); 