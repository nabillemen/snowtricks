$(document).ready(function() {
  // VIDEO MANAGEMENT

  var $container = $('ul#video-container');
  var originalMaxIndex = parseInt(document.querySelector("#video-container").getAttribute('video-max-id'));
  var order = document.querySelectorAll('#video-container input').length;
  var index = 0;

  if (order == 0) {
     index = -1;
  } else {
      var embed = document.querySelectorAll('#video-container embed').length;
      if (embed > 0 && order - embed == 0) {
          index = originalMaxIndex;
      } else {
          var rx = /trick_videos_(.*)_tag/;
          var inputs = document.querySelectorAll('#video-container input');
          index = parseInt(rx.exec(inputs[inputs.length-1].getAttribute('id'))[1]);
      }
  }

  if (order == 0) {
      addVideo($container);
  }

  $('#add_video').click(function(e) {
    addVideo($container);

    e.preventDefault();
    return false;
  });

  $('#remove_video').click(function(e) {
      $prototype = document.querySelectorAll('#video-container > div');
      $prototype[$prototype.length - 1].remove();
      index--;
      order--;
      e.preventDefault();

      if (order == 0) {
          addVideo($container);
      }

      return false;
  });

  function addVideo($container) {
    index++;
    order++;
    if (index < originalMaxIndex + 1) {
        index = originalMaxIndex + 1;
    }
    var template = $container.attr('data-prototype')
      .replace(/Tag/g, 'Vidéo ' + (order))
      .replace(/__name__/g,        index)
    ;

    var $prototype = $(template);

    $container.append($prototype);
  }

  // IMAGE MANAGEMENT

  var $imageContainer = $('ul#image-container');
  var imageOriginalMaxIndex = parseInt(document.querySelector("#image-container").getAttribute('image-max-id'));
  var imageOrder = document.querySelectorAll('#image-container input').length;
  var imageIndex = 0;

  if (imageOrder == 0) {
     imageIndex = -1;
  } else {
      var img = document.querySelectorAll('#image-container img').length;
      if (img > 0 && imageOrder - img == 0) {
          imageIndex = imageOriginalMaxIndex;
      } else {
          var imageRx = /trick_images_(.*)_file/;
          var imageInputs = document.querySelectorAll('#image-container input');
          imageIndex = parseInt(imageRx.exec(imageInputs[imageInputs.length-1].getAttribute('id'))[1]);
      }
  }

  if (imageOrder == 0) {
      addImage($imageContainer);
  }

  $('#add_image').click(function(e) {
    addImage($imageContainer);

    e.preventDefault();
    return false;
  });

  $('#remove_image').click(function(e) {
      $imagePrototype = document.querySelectorAll('#image-container > div');
      $imagePrototype[$imagePrototype.length - 1].remove();
      imageIndex--;
      imageOrder--;
      e.preventDefault();

      if (imageOrder == 0) {
          addImage($imageContainer);
      }

      return false;
  });

  function addImage($imageContainer) {
    imageIndex++;
    imageOrder++;
    if (imageIndex < imageOriginalMaxIndex + 1) {
        imageIndex = imageOriginalMaxIndex + 1;
    }
    var imageTemplate = $imageContainer.attr('data-prototype')
      .replace(/File/g, 'Image ' + (imageOrder))
      .replace(/__name__/g,        imageIndex)
    ;

    var $imagePrototype = $(imageTemplate);

    $imageContainer.append($imagePrototype);
  }

});
