wp.blocks.registerBlockType( "jialiblocktheme/footer", {
    title: "Jiali Footer",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Footer Placeholder")
    },
    save: function () {
        return null
    }
})