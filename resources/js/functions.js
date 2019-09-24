window.confirmFormSubmit = function (form, message) {
    if (this.confirm(message)) {
        $(form).submit();
    }
}
