wp.blocks.registerBlockType( "jialiblocktheme/single", {
    title: "Jiali Single",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Single Placeholder")
    },
    save: function () {
        return null
    }
})