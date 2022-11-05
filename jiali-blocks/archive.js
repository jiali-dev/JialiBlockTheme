wp.blocks.registerBlockType( "jialiblocktheme/archive", {
    title: "Jiali Archive",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Archive Placeholder")
    },
    save: function () {
        return null
    }
})