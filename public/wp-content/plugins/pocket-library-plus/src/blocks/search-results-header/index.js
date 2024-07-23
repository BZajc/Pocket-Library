import { registerBlockType } from "@wordpress/blocks";
import icons from "../icons";
import "./main.css";
import {
  useBlockProps,
  RichText,
  InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, ToggleControl } from "@wordpress/components";
import { __ } from "@wordpress/i18n";

registerBlockType("pocket-library-plus/search-results-header", {
  icon: icons.pocketLibraryIcon,
  edit({ attributes, setAttributes }) {
    const { content, customText } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Main", "pocket-library-plus")}>
            <ToggleControl
              label={__("Show query", "pocket-library-plus")}
              checked={customText}
              onChange={(customText) => setAttributes({ customText })}
              help={
                customText
                  ? __("Show Search Query", "pocket-library-plus")
                  : __("Show Custom Text", "pocket-library-plus")
              }
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          {customText ? (
            <h1>{__("Query: Some Query", "pocket-library-plus")}</h1>
          ) : (
            <RichText
              tagName="h1"
              placeholder={__("Search Query Heading", "pocket-library-plus")}
              value={content}
              onChange={(content) => setAttributes({ content })}
            />
          )}
        </div>
      </>
    );
  },
});
