wp.blocks.registerBlockType( "jialiblocktheme/double-banner", {
    title: "Jiali Double Banner",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Double Banner Placeholder")
    },
    save: function () {
        return null
    }
})