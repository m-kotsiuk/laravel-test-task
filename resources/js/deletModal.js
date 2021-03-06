
const initDeleteModal = () => {
    const deleteForm = $('.js-delete-item-form');
    const itemTitleHolder = $('#delete-modal').find('.js-item-title');

    $(document).on('click', '.js-item-delete', function () {
        var action = $(this).attr('href');
        var title = $(this).data('title');
        deleteForm.attr('action', action);
        itemTitleHolder.text(title);
    });
};

export default initDeleteModal;
