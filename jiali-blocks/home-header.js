wp.blocks.registerBlockType( "jialiblocktheme/home-header", {
    title: "Jiali Home Header",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Home Header Placeholder")
    },
    save: function () {
        return null
    }
})