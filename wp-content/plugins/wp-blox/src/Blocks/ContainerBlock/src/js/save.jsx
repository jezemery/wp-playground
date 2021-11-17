import React, {Fragment} from 'react';
import {InnerBlocks} from '@wordpress/block-editor';
import PropTypes from "prop-types";
import {Component} from "@wordpress/element";
import {useSelect} from "@wordpress/data";

class SaveComponent extends Component {
  constructor(props) {
    super(props);
  }

  getFlexAlignment(alignment) {
    let Y = 'top';
    let X = 'left';

    if (alignment != undefined) {
      const args = alignment.split(" ");

      Y = args[0];
      X = args[1]
    }

    const xConversions = {
      'left': 'flex-start',
      'right': 'flex-end',
      'center': 'center'
    };

    const yConversions = {
      'top': 'flex-start',
      'bottom': 'flex-end',
      'center': 'center'
    };

    return {
      display: 'flex',
      flexDirection: 'column',
      justifyContent: xConversions[X],
      alignItems: yConversions[Y]
    }
  }

  getClassList(fullHeight) {
    let classList = "container";

    if (fullHeight) {
      classList += " container--fh"
    }

    return classList;
  }

  render() {
    const {attributes} = this.props;
    const classList = this.getClassList(attributes.fullHeight);
    const alignment = this.getFlexAlignment(attributes.alignment);

    const blockStyle = {
      backgroundColor: attributes.backgroundColor,
      backgroundImage: attributes.mediaUrl != '' ? 'url("' + attributes.mediaUrl + '")' : 'none',
      backgroundSize: 'cover'
    };

    return (
      <Fragment>
        <section
          style={blockStyle}>
          <div className={classList} style={alignment}>
            <InnerBlocks.Content/>
          </div>
        </section>
      </Fragment>
    )
  }

}

export default function Save(props) {
  return <SaveComponent {...props} />
}

SaveComponent.propTypes = {
  attributes: PropTypes.object
}