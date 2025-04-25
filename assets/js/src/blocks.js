/**
 * WordPress Blocks Registration
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { createBlockAttributes } from './editor/blocks';

// Block registration configurations
const blocks = [
  {
    name: 'wptsp/hero',
    settings: {
      title: __('Hero Section', 'wptsp'),
      icon: 'align-wide',
      category: 'wptsp-blocks',
      attributes: {
        title: { type: 'string' },
        description: { type: 'string' },
        background: { type: 'object' },
        buttons: { type: 'array' },
        options: {
          type: 'object',
          default: {
            id: '',
            classes: '',
            align: '',
            bg: { color: '' },
            has_animation: false
          }
        }
      }
    }
  },
  {
    name: 'wptsp/cta',
    settings: {
      title: __('Call to Action', 'wptsp'),
      icon: 'megaphone',
      category: 'wptsp-blocks',
      attributes: {
        title: { type: 'string' },
        text: { type: 'string' },
        buttons: { type: 'array' },
        layout: { type: 'string' },
        options: {
          type: 'object',
          default: {
            id: '',
            classes: '',
            align: '',
            bg: { color: '' },
            has_animation: false
          }
        }
      }
    }
  },
  {
    name: 'wptsp/cards',
    settings: {
      title: __('Cards Grid', 'wptsp'),
      icon: 'grid-view',
      category: 'wptsp-blocks',
      attributes: {
        cards: { type: 'array' },
        columns: { type: 'number', default: 3 },
        style: { type: 'string' },
        options: {
          type: 'object',
          default: {
            id: '',
            classes: '',
            align: '',
            bg: { color: '' },
            has_animation: false
          }
        }
      }
    }
  },
  {
    name: 'wptsp/text-block',
    settings: {
      title: __('Text Block', 'wptsp'),
      icon: 'text',
      category: 'wptsp-blocks',
      attributes: {
        text: { type: 'string' },
        width: { type: 'string' },
        options: {
          type: 'object',
          default: {
            id: '',
            classes: '',
            align: '',
            bg: { color: '' },
            has_animation: false
          }
        }
      }
    }
  },
  {
    name: 'wptsp/video',
    settings: {
      title: __('Video', 'wptsp'),
      icon: 'video-alt3',
      category: 'wptsp-blocks',
      attributes: {
        video: { type: 'object' },
        poster_image: { type: 'object' },
        caption: { type: 'string' },
        options: {
          type: 'object',
          default: {
            id: '',
            classes: '',
            align: '',
            bg: { color: '' },
            has_animation: false
          }
        }
      }
    }
  }
];

// Register all blocks
blocks.forEach(({ name, settings }) => {
  registerBlockType(name, {
    ...settings,
    edit: ({ attributes, setAttributes }) => {
      // Block editor UI will be implemented here
      return null;
    },
    save: ({ attributes }) => {
      // Block save method will be implemented here
      return null;
    }
  });
});