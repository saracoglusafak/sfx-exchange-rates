"use strict";

(function ($) {
  // console.log(sfxexchangerates_plugin_url);
  // console.log(sfxexchangerates_process_admin_url);
  console.log("admin");

  var _body = $("body");

  $('.sortable').sortable({
    connectWith: ".sortable > div",
    opacity: 0.8,
    revert: true,
    forceHelperSize: true,
    forcePlaceholderSize: true,
    // placeholder: 'draggable-placeholder',
    tolerance: 'pointer' // axis: 'x'

  }).disableSelection();

  _body.on('click', '.sfxexchangerates-remove-closest', function (e) {
    e.preventDefault();

    var _this = $(this);

    var _data = _this.data(); // console.log(_data);
    // console.log(_data.removeClosest);


    _this.closest(_data.removeClosest).remove();
  });

  var _mediaUploader = [];
  $('.sfxexchangerates-select-image').click(function (e) {
    e.preventDefault();

    var _this = $(this);

    var _data = _this.data();

    _data.id = _data.target.replace(/[^a-zA-Z0-9]/g, ''); // console.log(_data);
    // console.log(typeof _mediaUploader[_data.id]);

    if (_mediaUploader[_data.id]) {
      _mediaUploader[_data.id].open();

      return;
    }

    _mediaUploader[_data.id] = wp.media.frames.file_frame = wp.media({
      title: _data.title,
      button: {
        text: _data.buttonText
      },
      library: {
        type: "image" //type: ["video", "image"]

      },
      multiple: _data.multiple
    });

    _mediaUploader[_data.id].on('select', function () {
      if (_data.multiple) {
        var _elements = _mediaUploader[_data.id].state().get('selection').toJSON(); // console.log(_elements);


        for (var index = 0; index < _elements.length; index++) {
          // console.log(_elements[index]);
          // console.log(_elements[index].sizes);
          // console.log(_elements[index].sizes.thumbnail.url);
          var ADD = '<div id="sfxexchangerates-image-' + _elements[index].id + '" class="sfxexchangerates-image col-4">';
          ADD += '<a href="#" class="sfxexchangerates-remove-closest" data-remove-closest=".sfxexchangerates-image"></a>';
          ADD += '<img src="' + _elements[index].sizes.thumbnail.url + '">';
          ADD += '<input type="hidden" name="' + _data.name + '[]" value="' + _elements[index].id + '">';
          ADD += '</div>';
          $(_data.target).append(ADD);
        }
      } else {
        var _element = _mediaUploader[_data.id].state().get('selection').first().toJSON(); // console.log(_element);


        var ADD = '<div id="sfxexchangerates-image-' + _element.id + '" class="sfxexchangerates-image col-4">';
        ADD += '<a href="#" class="sfxexchangerates-remove-closest" data-remove-closest=".sfxexchangerates-image"></a>';
        ADD += '<img src="' + _element.sizes.thumbnail.url + '">';
        ADD += '<input type="hidden" name="' + _data.name + '" value="' + _element.id + '">';
        ADD += '</div>';
        console.log(_data.target);
        $(_data.target).html(ADD);
      }
    });

    _mediaUploader[_data.id].open();
  });
})(jQuery);