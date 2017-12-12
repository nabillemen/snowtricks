var $videosHolder;

// setup an "add a tag" link
// <button id="add_image" class="btn btn-success" type="button"></button>
var $addVideoLink = $('<a href="#" class="btn btn-success add_video_file"><i class="fa fa-plus"></i> Ajouter une vidéo</a>');
var $newVideoLinkLi = $('<li></li>').append($addVideoLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $videosHolder = $('ul.videos');

    $videosHolder.find('li').each(function() {
        if($(this).find("embed").length == 0 && $(this).find(".alert").length == 0) {
            $(this).addClass("list-tag");
        }
        addTagFormDeleteLink($(this));
    });

    // add the "add a tag" anchor and li to the tags ul
    $videosHolder.append($newVideoLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $videosHolder.data('index', $videosHolder.find(':input').length);

    if ($videosHolder.data('index') == 0) {
        addVideoForm($videosHolder, $newVideoLinkLi);
    }

    $addVideoLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addVideoForm($videosHolder, $newVideoLinkLi);
    });

    function addVideoForm($videosHolder, $newVideoLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $videosHolder.data('prototype');

        // get the new index
        var index = $videosHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $videosHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newFormLi.addClass("list-tag");
        $newVideoLinkLi.before($newFormLi);
        addTagFormDeleteLink($newFormLi);
    }

    function addTagFormDeleteLink($fileFormLi) {
        var $removeFormA = $('<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>');
        if($fileFormLi.is(".alert")) {
            return;
        }
        if ($fileFormLi.find("embed").length > 0) {
            $removeFormA.addClass('list-embed-cross');
        } else {
            $removeFormA.addClass('list-tag-cross');
        }
        $fileFormLi.append($removeFormA);

        $fileFormLi.mouseenter(function() {
            if($fileFormLi.find("embed").length == 0) {
                $fileFormLi.addClass("hovered");
            }
            $removeFormA.removeClass("d-none");
            $removeFormA.addClass("d-block");
        });

        $fileFormLi.mouseleave(function() {
            $fileFormLi.removeClass("hovered");
            $removeFormA.removeClass("d-block");
            $removeFormA.addClass("d-none");
        });

        $removeFormA.on('click', function(e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li for the tag form
            if($fileFormLi.prev().is('.alert-list')) {
                $fileFormLi.prev().remove();
            }
            $fileFormLi.remove();
        });
    }

});
