wp.blocks.registerBlockType( "jialiblocktheme/single-app", {
    title: "Jiali Single App",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Single App Placeholder")
    },
    save: function () {
        return null
    }
})