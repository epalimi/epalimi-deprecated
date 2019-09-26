window.confirmFormSubmit = function (form, message) {
    if (this.confirm(message)) {
        $(form).submit();
    }
}

window.toggleDisable = function (target) {
    $(target).attr('disabled', !($(target).attr('disabled')));
}
