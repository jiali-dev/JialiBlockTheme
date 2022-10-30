wp.blocks.registerBlockType( "jialiblocktheme/daily-pictures", {
    title: "Jiali Daily pictures",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Jiali Daily pictures Placeholder")
    },
    save: function () {
        return null
    }
})