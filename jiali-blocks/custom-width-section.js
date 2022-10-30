
import { InnerBlocks } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"

registerBlockType("jialiblocktheme/custom-width-section", {
  title: "Jiali Custom Width Section",
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
  return null
}
