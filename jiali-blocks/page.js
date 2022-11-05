wp.blocks.registerBlockType( "jialiblocktheme/page", {
    title: "Jiali Page",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Page Placeholder")
    },
    save: function () {
        return null
    }
})