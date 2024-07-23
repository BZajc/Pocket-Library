import { registerBlockType } from "@wordpress/blocks";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody } from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import icons from "../icons.js";
import "./main.css";
import block from "./block.json";

registerBlockType(block.name, {
  icon: icons.pocketLibraryIcon,
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Main", "pocket-library-plus")}>
            Panel Body Content
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <a className="auth-container" href="#">
            <div className="auth-icon">{icons.accountIcon}</div>
            <div className="auth-text">My Account</div>
          </a>
        </div>
      </>
    );
  },
});
