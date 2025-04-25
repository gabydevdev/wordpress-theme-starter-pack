/**
 * Block Utility Functions
 */

// Handle block background images with responsive loading
export const initBlockBackgrounds = () => {
  const blocks = document.querySelectorAll('[data-background]');
  blocks.forEach(block => {
    const bgUrl = block.dataset.background;
    if (bgUrl) {
      const img = new Image();
      img.src = bgUrl;
      img.onload = () => {
        block.style.backgroundImage = `url(${bgUrl})`;
        block.classList.add('has-background');
      };
    }
  });
};

// Handle block alignment
export const initBlockAlignment = () => {
  const blocks = document.querySelectorAll('[data-align]');
  blocks.forEach(block => {
    const alignment = block.dataset.align;
    if (alignment) {
      block.style.setProperty('--align', alignment);
    }
  });
};

// Initialize all block functionality
export const initBlocks = () => {
  initBlockBackgrounds();
  initBlockAlignment();
};