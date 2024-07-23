import { registerBlockType } from "@wordpress/blocks";
import {
  RichText,
  useBlockProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";
import { PanelBody, ColorPalette, RangeControl } from "@wordpress/components";
import block from "./block.json";
import "./main.css";
import icons from '../icons'

registerBlockType(block.name, {
  icon: icons.pocketLibraryIcon,
  edit({ attributes, setAttributes }) {
    const { content, border_color, padding, text_color } = attributes;
    const blockProps = useBlockProps({
      className: "example-block",
      style: {
        border: `2px solid ${border_color || "rgb(105 208 233)"}`,
        borderRadius: "8px",
        padding: `${padding}px`,
        color: `${text_color || "rgb(105 208 233)"}`,
      },
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Text Color", "pocket-library-plus")}>
            <ColorPalette
              colors={[
                { name: "Black", color: "rgb(0,0,0)" },
                { name: "White", color: "rgb(255,255,255)" },
                { name: "Blue Light", color: "rgb(105 208 233)" },
                { name: "Blue Dark", color: "rgb(44 185 220)" },
              ]}
              value={text_color}
              onChange={(text_color) => setAttributes({ text_color })}
            />
          </PanelBody>
          <PanelBody title={__("Border Color", "pocket-library-plus")}>
            <ColorPalette
              colors={[
                { name: "Black", color: "rgb(0,0,0)" },
                { name: "White", color: "rgb(255,255,255)" },
                { name: "Blue Light", color: "rgb(105 208 233)" },
                { name: "Blue Dark", color: "rgb(44 185 220)" },
              ]}
              value={border_color}
              onChange={(border_color) => setAttributes({ border_color })}
            />
          </PanelBody>
          <PanelBody title={__("Padding", "pocket-library-plus")}>
            <RangeControl
              label={__("Padding", "pocket-library-plus")}
              value={padding}
              onChange={(padding) => setAttributes({ padding })}
              min={0}
              max={50}
            />
          </PanelBody>
        </InspectorControls>
        <RichText
          {...blockProps}
          tagName="h3"
          placeholder={__("Enter heading", "pocket-library-plus")}
          value={content}
          onChange={(content) => setAttributes({ content })}
          allowedFormats={["core/text-color", "core/bold", "core/link"]}
        />
      </>
    );
  },
  save({ attributes }) {
    const { content, border_color, padding, text_color } = attributes;
    const blockProps = useBlockProps.save({
      className: "example-block",
      style: {
        border: `2px solid ${border_color || "rgb(105 208 233)"}`,
        borderRadius: `8px`,
        padding: `${padding}px`,
        color: `${text_color || "rgb(105 208 233)"}`,
      },
    });

    return <RichText.Content {...blockProps} tagName="h3" value={content} />;
  },
});
