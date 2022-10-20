wp.blocks.registerBlockType( "jialiblocktheme/header", {
    title: "Jiali Header",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Header Placeholder")
    },
    save: function () {
        return null
    }
})