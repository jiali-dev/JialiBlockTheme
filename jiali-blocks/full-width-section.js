
import { InnerBlocks } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"

registerBlockType("jialiblocktheme/full-width-section", {
  title: "Jiali Full Width Section",
  edit: EditComponent,
  save: SaveComponent
})

function EditComponent() {
  return (
    <> 
      <InnerBlocks />
    </>
  )
}

function SaveComponent() {
  return (
    <>
      <div className="jiali-section-full-width-transparent">

        <InnerBlocks.Content />

      </div>

    </>
  )
  
}
