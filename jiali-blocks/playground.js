wp.blocks.registerBlockType( "jialiblocktheme/playground", {
    title: "Jiali Playground",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Playground Placeholder")
    },
    save: function () {
        return null
    }
})