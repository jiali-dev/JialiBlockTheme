wp.blocks.registerBlockType( "jialiblocktheme/top-articles", {
    title: "Jiali Top Articles",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Top Articles Placeholder")
    },
    save: function () {
        return null
    }
})