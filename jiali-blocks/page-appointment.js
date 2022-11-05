wp.blocks.registerBlockType( "jialiblocktheme/page-appointment", {
    title: "Jiali Page Appointment",
    edit: function () {
        return wp.element.createElement("div", { className: "jiali-placeholder-block" }, "Page Appointment Placeholder")
    },
    save: function () {
        return null
    }
})