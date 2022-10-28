wp.blocks.registerBlockType( "jialiblocktheme/services", {
    title: "Jiali Services",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Services Placeholder")
    },
    save: function () {
        return null
    }
})