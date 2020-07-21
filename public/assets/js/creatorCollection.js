var $collectionHolder;

// setup an "add a tag" link
var $addCreatorButton = $('<button type="button" class="btn btn-success">Add Creator</button>');
var $newLinkContainer = $('<div class="buttonContainer"></div>').append($addCreatorButton);

jQuery(document).ready(function() {
    var $selector = $('fieldset > div[id*="isInvolvedIns"]').attr('id');

    // Get the ul that holds the collection of tags
    $collectionHolder = $('#' + $selector);

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkContainer);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('input').length);

    $addCreatorButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addCreatorForm($collectionHolder, $newLinkContainer);
    });
});

function addCreatorForm($collectionHolder, $newLinkContainer) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__label__/g, '');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, '');

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormContainer = $('<div class="creatorContainer"></div>').append(newForm);

    $newFormContainer.append('<button type="button" class="btn btn-danger remove-creator">Remove Creator</button>');
    $newLinkContainer.before($newFormContainer);
    $('.creatorContainer fieldset.form-group').addClass('col-8');

    $('.remove-creator').click(function(e) {
        e.preventDefault();
        $(this).parent().remove();
        return false;
    });
}