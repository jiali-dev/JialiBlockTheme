wp.blocks.registerBlockType( "jialiblocktheme/categories", {
    title: "Jiali Categories",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Categories Placeholder")
    },
    save: function () {
        return null
    }
})