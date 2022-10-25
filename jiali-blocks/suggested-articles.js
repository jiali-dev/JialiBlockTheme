wp.blocks.registerBlockType( "jialiblocktheme/suggested-articles", {
    title: "Jiali Suggested Articles",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Suggested Articles Placeholder")
    },
    save: function () {
        return null
    }
})