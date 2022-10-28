wp.blocks.registerBlockType( "jialiblocktheme/appointment", {
    title: "Jiali Appointment",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "appointment Placeholder")
    },
    save: function () {
        return null
    }
})