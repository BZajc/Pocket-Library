import { registerBlockType } from "@wordpress/blocks";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";
import { PanelBody, ToggleControl } from "@wordpress/components";
import block from "./block.json";
import "./main.css";
import icons from "../icons";

registerBlockType(block.name, {
  icon: icons.pocketLibraryIcon,
  edit({ attributes, setAttributes }) {
    const { showRegister } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Main", "pocket-library-plus")}>
            <ToggleControl label={__("Show Register Form", "pocket-library-plus")} help={
                showRegister ? __("Showing registration form", "pocket-library-plus") : __("Hiding registration form", "pocket-library-plus")
            }
            checked={showRegister}
            onChange={showRegister => setAttributes({showRegister})}/>
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          {__(
            "You cannot preview this block from the editor. Visit site to check it out.",
            "pocket-library-plus"
          )}
        </div>
      </>
    );
  },
});
