(function() {
    const trigger = '[name="combinedInvoice"]';
    const target = '#js-issueCombinedInvoice';
    $(trigger).on('change', function () {
    if ($(trigger + ':checked').length > 0) {
        $(target).addClass('is-active');
    }else{
        $(target).removeClass('is-active');
    }
});
})();

