wp.blocks.registerBlockType( "jialiblocktheme/top-header", {
    title: "Jiali Top Header",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Top Header Placeholder")
    },
    save: function () {
        return null
    }
})