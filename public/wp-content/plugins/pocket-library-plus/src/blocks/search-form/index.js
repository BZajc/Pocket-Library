import { registerBlockType } from "@wordpress/blocks";
import {
  useBlockProps,
  PanelColorSettings,
  InspectorControls,
} from "@wordpress/block-editor";
import block from "./block.json";
import { __ } from "@wordpress/i18n";
import icons from "../icons";
import "./main.css";

registerBlockType(block.name, {
  icon: icons.pocketLibraryIcon,

  edit({ attributes, setAttributes }) {
    const { bgColor, textColor } = attributes;
    const blockProps = useBlockProps({
      style: {
        "background-color": bgColor,
        color: textColor,
      },
    });

    return (
      <>
        <InspectorControls>
          {/* PanelColorSettings used instead of ColorPalette as an example. Removes custom color palette so UI looks cleaner */}
          <PanelColorSettings
            title={__("Colors", "pocket-library-plus")}
            colorSettings={[
              {
                label: __("Background Color", "pocket-library-plus"),
                value: bgColor,
                onChange: (bgColor) => setAttributes({ bgColor }),
              },
              {
                label: __("Text Color", "pocket-library-plus"),
                value: textColor,
                onChange: (textColor) => setAttributes({ textColor }),
              },
            ]}
          />
        </InspectorControls>
        <div {...blockProps}>
          <form className="search-form">
            <input
              type="text"
              placeholder="Search"
              className="search-form-input"
              style={{
                "background-color": bgColor,
                color: textColor,
              }}
            />
            <div>
              <button type="submit" className="search-form-button">
              &#x1F50E;
              </button>
            </div>
          </form>
        </div>
      </>
    );
  },
});
