wp.blocks.registerBlockType( "jialiblocktheme/top-categories", {
    title: "Jiali Top Categories",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Top Categories Placeholder")
    },
    save: function () {
        return null
    }
})