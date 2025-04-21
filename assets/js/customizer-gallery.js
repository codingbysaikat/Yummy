jQuery(function($) {
    
    wp.customize.bind('ready', function() {
        var control = wp.customize.control('gallery_images');
        console.log(control);
        if (!control) return;

        var button = $('<button class="button">Upload Gallery Images</button>');
        control.container.append(button);

        button.on('click', function(e) {
            e.preventDefault();

            var frame = wp.media({
                title: 'Select Images',
                button: { text: 'Use These Images' },
                multiple: true
            });

            frame.on('select', function() {
                var selection = frame.state().get('selection');
                var urls = [];

                selection.each(function(attachment) {
                    urls.push(attachment.toJSON().url);
                });

                control.setting.set(JSON.stringify(urls));
            });

            frame.open();
        });
    });
});

