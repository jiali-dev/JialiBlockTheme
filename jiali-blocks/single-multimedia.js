wp.blocks.registerBlockType( "jialiblocktheme/single-multimedia", {
    title: "Jiali Single Multimedia",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Single Multimedia Placeholder")
    },
    save: function () {
        return null
    }
})