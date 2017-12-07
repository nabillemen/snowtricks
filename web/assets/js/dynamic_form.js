$(document).ready(function() {

  var $container = $('ul#video-container');
  var inDatabase = parseInt(document.querySelector("#video-container").getAttribute('video-id-amount'));
  var originalInputs = document.querySelectorAll('#video-container input');
  var originalAmount = originalInputs.length;
  var rx = /trick_videos_(.*)_tag/;
  var index = 0;
  if (originalAmount > 0) {
      index = parseInt(rx.exec(originalInputs[originalAmount-1].getAttribute('id'))[1]);
  }
  var order = originalAmount;

  if (document.querySelectorAll('#video-container input').length == 0) {
      addVideo($container);
  }

  $('#add_video').click(function(e) {
    addVideo($container);

    e.preventDefault();
    return false;
  });

  $('#remove_video').click(function(e) {
      $prototype = document.querySelectorAll('#video-container > div');
      //$prototype[$prototype.length - 1].remove();
      $prototype[order - 1].remove();
      index--;
      order--;
      e.preventDefault();

      if (order <= 0) {
          addVideo($container);
      }

      return false;
  });

  function addVideo($container) {
    if (order != 0) {
        index++;
    }
    order++;
    if (inDatabase != 0 && index < inDatabase) {
        index = inDatabase;
    }
    var template = $container.attr('data-prototype')
      .replace(/Tag/g, 'Vidéo ' + (order))
      .replace(/__name__/g,        index)
    ;

    var $prototype = $(template);

    $container.append($prototype);

    if (order == 0) {
        index++;
    }
  }

});
