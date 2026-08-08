/**
 * Astrix Admin Media Uploader & Meta Box Enhancements.
 * Connects standard WordPress wp.media modal to custom image fields.
 */
(function ($) {
  'use strict';

  $(document).on('click', '.ax-media-upload-btn', function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInput = button.siblings('.ax-media-input');
    var previewWrap = button.siblings('.ax-media-preview');

    var customUploader = wp.media({
      title: 'Select or Upload Asset for Astrix Section',
      button: { text: 'Use this Image' },
      multiple: false
    });

    customUploader.on('select', function () {
      var attachment = customUploader.state().get('selection').first().toJSON();
      targetInput.val(attachment.url).trigger('change');
      if (previewWrap.length) {
        previewWrap.html('<img src="' + attachment.url + '" style="max-height:120px; border-radius:4px; margin-top:8px; display:block; border:1px solid #ddd;">');
      }
    });

    customUploader.open();
  });

  $(document).on('click', '.ax-media-remove-btn', function (e) {
    e.preventDefault();
    var button = $(this);
    button.siblings('.ax-media-input').val('').trigger('change');
    button.siblings('.ax-media-preview').empty();
  });

})(jQuery);
