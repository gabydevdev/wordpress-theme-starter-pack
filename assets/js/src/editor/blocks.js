import { __ } from '@wordpress/i18n';
import { RichText, MediaUpload, useBlockProps } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

// Helper function to create block attributes
export const createBlockAttributes = (attributes) => ({
  align: {
    type: 'string',
    default: 'full'
  },
  anchor: {
    type: 'string'
  },
  ...attributes
});

// Helper function for media upload button
export const MediaUploadButton = ({ onSelect, value, label }) => (
  <MediaUpload
    onSelect={onSelect}
    allowedTypes={['image']}
    value={value}
    render={({ open }) => (
      <Button
        onClick={open}
        variant="secondary"
        className="editor-media-placeholder__button"
      >
        {label || __('Choose Image', 'wptsp')}
      </Button>
    )}
  />
);

// Block category registration
export const blockCategory = {
  slug: 'wptsp-blocks',
  title: __('WPTSP Blocks', 'wptsp')
};