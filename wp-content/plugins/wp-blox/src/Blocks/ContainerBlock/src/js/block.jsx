import {registerBlockType} from "@wordpress/blocks";
import Edit from './edit';
import Save from "./save";
import "../style/block.editor.scss";
import "../style/block.scss";

registerBlockType('wp-blox/container', {
  title: 'Container',
  description: 'Component which normally just holds other components',
  icon: 'layout',
  category: 'wp-blox',
  attributes: {
    content: {
      type: 'string'
    },
    backgroundColor: {
      type: "string",
      default: "rgba(80,80,80,0.02)"
    },
    fullHeight: {
      type: "boolean"
    },
    alignment: {
      type: "string"
    },
    mediaId: {
      type: 'number',
      default: 0
    },
    mediaUrl: {
      type: 'string',
      default: ''
    },
    media: {
      type: 'object'
    }

  },
  edit: Edit,
  save: Save,
});
