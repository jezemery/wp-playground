import {
  ColorPalette,
  InnerBlocks,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
  useBlockProps
} from "@wordpress/block-editor";
import {Component} from "@wordpress/element";
import React, {Fragment} from "react";
import {
  Dashicon,
  Panel,
  PanelBody,
  ToggleControl,
  __experimentalAlignmentMatrixControl as AlignmentMatrixControl, Button, ResponsiveWrapper
} from "@wordpress/components";

/**
 *
 */
class EditClass extends Component {
  constructor(props) {
    super(props);
  }

  /**
   * @returns {JSX.Element}
   */
  render() {
    return (
      <Fragment>
        <InnerBlocks/>
      </Fragment>
    )
  }
}

EditClass.propTypes = {};
/**
 * @param props
 * @returns {JSX.Element}
 * @constructor
 */
export default function Edit(props) {
  const {attributes, setAttributes} = props;

  console.table(attributes)

  const blockProps = useBlockProps({
    style: {
      border: '2px dashed rgba(0,0,0,0.2)',
      backgroundColor: attributes.backgroundColor,
      padding: '5px 15px 10px 20px',
      marginTop: '15px'
    }
  });

  const removeMedia = () => {
    props.setAttributes({
      mediaId: 0,
      mediaUrl: ''
    });
  }

  const onSelectMedia = (media) => {
    setAttributes({
      mediaId: Number(media.id),
      mediaUrl: String(media.url),
      media: media
    })
  }

  return (
    <div {...blockProps}>
      <InspectorControls key="setting">
        <Panel>
          <PanelBody title="Height Options" icon={<Dashicon icon="more"/>} initialOpen={false}>
            <ToggleControl
              label="Full Height"
              help={attributes.fullHeight ? 'Will be at least the height of the window' : 'Will resize to fit content'}
              checked={attributes.fullHeight}
              onChange={(value) => setAttributes({fullHeight: value})}
            />
          </PanelBody>
        </Panel>
        <Panel>
          <PanelBody
            title="Content Options"
            icon={<Dashicon icon="more"/>}
            initialOpen={false}>
            <AlignmentMatrixControl
              label="Content alignment"
              defaultValue='top left'
              value={attributes.alignment}
              onChange={(e) => setAttributes({alignment: e})}
            />
          </PanelBody>
        </Panel>
        <Panel>
          <PanelBody
            title="Background Color"
            icon={<Dashicon icon="more"/>}
            initialOpen={false}>
            <ColorPalette
              value={attributes.backgroundColor}
              onChange={(newValue) => setAttributes({backgroundColor: newValue})}
            />
          </PanelBody>
        </Panel>
        <Panel>
          <PanelBody
            title="Background Image"
            icon={<Dashicon icon="more"/>}
            initialOpen={false}>
            <div className="editor-post-featured-image">
              <MediaUploadCheck>
                <MediaUpload value={attributes.mediaId} onSelect={onSelectMedia} allowedTypes={['image']}
                             render={({open}) => (
                               <Button
                                 className={attributes.mediaId === 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
                                 onClick={open}>
                                 {attributes.mediaId === 0 && 'Choose an image'}
                                 {attributes.mediaId != 0 &&
                                 <ResponsiveWrapper naturalWidth={attributes.media.sizes.thumbnail.width}
                                                    naturalHeight={attributes.media.sizes.thumbnail.height}>
                                   <img src={attributes.media.sizes.thumbnail.url}/>
                                 </ResponsiveWrapper>
                                 }
                               </Button>
                             )}
                />
              </MediaUploadCheck>
              {attributes.mediaId != 0 &&
              <MediaUploadCheck>
                <Button onClick={removeMedia} isLink isDestructive>Remove image</Button>
              </MediaUploadCheck>
              }
            </div>
          </PanelBody>
        </Panel>
      </InspectorControls>
      <EditClass {...props}/>
    </div>
  );
}
