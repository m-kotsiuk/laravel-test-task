const initLengthInput = () => {
    $('.js-length-input').each((_, el) => {
        const $input = $(el).find('input');
        const $count = $(el).find('.js-length-input-count');
        const update = () => {
            $count.text(String($input.val().length));
        };
        update();
        $input.on('input', update);
    });
}

export default initLengthInput;
