wp.blocks.registerBlockType( "jialiblocktheme/recent-media", {
    title: "Jiali Recent Media",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Recent Media Placeholder")
    },
    save: function () {
        return null
    }
})