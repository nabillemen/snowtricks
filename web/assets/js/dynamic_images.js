var $collectionHolder;

// setup an "add a tag" link
// <button id="add_image" class="btn btn-success" type="button"></button>
var $addFileLink = $('<a href="#" class="btn btn-success add_image_file"><i class="fa fa-plus"></i> Ajouter une image</a>');
var $newLinkLi = $('<li></li>').append($addFileLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.images');

    $collectionHolder.find('li').each(function() {
        if($(this).find("img").length == 0) {
            $(this).addClass("list-file");
        }
        addFileFormDeleteLink($(this));
    });

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    if ($collectionHolder.data('index') == 0) {
        addImageForm($collectionHolder, $newLinkLi);
    }

    $addFileLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addImageForm($collectionHolder, $newLinkLi);
    });

    function addImageForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newFormLi.addClass('list-file');
        $newLinkLi.before($newFormLi);
        addFileFormDeleteLink($newFormLi);
    }

    function addFileFormDeleteLink($fileFormLi) {
        var $removeFormA = $('<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>');
        if($fileFormLi.is(".alert")) {
            return;
        }
        if ($fileFormLi.find("img").length > 0) {
            $removeFormA.addClass('list-image-cross');
        } else {
            $removeFormA.addClass('list-file-cross');
        }
        $fileFormLi.append($removeFormA);

        $fileFormLi.mouseenter(function() {
            if($fileFormLi.find("img").length == 0) {
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
