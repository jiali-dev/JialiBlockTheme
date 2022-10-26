wp.blocks.registerBlockType( "jialiblocktheme/recent-articles", {
    title: "Jiali Recent Articles",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Top Recent Articles")
    },
    save: function () {
        return null
    }
})