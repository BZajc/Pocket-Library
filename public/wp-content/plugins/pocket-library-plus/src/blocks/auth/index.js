import { registerBlockType } from "@wordpress/blocks";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, ToggleControl } from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import icons from "../icons.js";
import "./main.css";
import block from "./block.json";

registerBlockType(block.name, {
  icon: icons.pocketLibraryIcon,
  edit({ attributes, setAttributes }) {
    const { showAuth } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Main", "pocket-library-plus")}>
            <ToggleControl
              label={__("Show Login/Register link", "pocket-library-plus")}
              checked={showAuth}
              onChange={(value) => setAttributes({ showAuth: value })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          {showAuth && (
            <a className="auth-container" href="#">
              <div className="auth-icon">{icons.accountIcon}</div>
              <div className="auth-text">My Account</div>
            </a>
          )}
        </div>
      </>
    );
  },
});
