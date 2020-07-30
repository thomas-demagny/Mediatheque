var $creatorCollectionHolder;

var $addCreatorButton = $('<button type="button" class="btn btn-success">Ajouter Artiste</button>');
var $newCreatorContainer = $('<div class="creatorButton buttonContainer"></div>').append($addCreatorButton);

jQuery(document).ready(function() {
    // Find the Collection group
    var $collectionSelector = $('fieldset > div[id*="guest"]').attr('id');
    $creatorCollectionHolder = $('#' + $collectionSelector);

    // Add "Add New" Button
    $creatorCollectionHolder.append($newCreatorContainer);

    // Initializing index
    // $creatorCollectionHolder.data('index', 0);

    // Set all existing Entities of the Collection
    $collectionEntities = $creatorCollectionHolder.find('fieldset');
    $.each($collectionEntities, function($collectionIndex, $collectionEntity) {
        $($collectionEntity).find('legend').text('');
        encapsulateCreatorEntity($collectionEntity, $newCreatorContainer);
    });
    
    // Add "New Form" Event
    $addCreatorButton.on('click', function(e) {
        addCreatorForm($creatorCollectionHolder, $newCreatorContainer);
    });
});


function addCreatorForm($creatorCollectionHolder, $newCreatorContainer) {
    // Get the prototype of the Form for the new Entity
    var prototype = $creatorCollectionHolder.data('prototype');
    var newForm = prototype;

    // Get the new index
    // var index = $creatorCollectionHolder.data('index');

    // Set the new Entity of the Collection
    newForm = treatFormLabel(newForm);
    encapsulateCreatorEntity(newForm, $newCreatorContainer);
}


function treatFormLabel($form, index = '') {
    $form = $form.replace(/__name__label__/g, index);
    return $form;
}


function encapsulateCreatorEntity($collectionEntity, newCreatorContainer) {
    // Get the new index
    // var index = $creatorCollectionHolder.data('index');

    var $newFormContainer = $('<div class="creatorContainer"></div>').append($collectionEntity);

    // Add "Remove" Button
    $newFormContainer.append('<button type="button" class="btn btn-danger remove-creator">Supprimer</button>');
    
    $newCreatorContainer.before($newFormContainer);
    $('.creatorContainer fieldset.form-group').addClass('col-8');

    // Increase the index of one for the next item
    // $creatorCollectionHolder.data('index', ++index);

    // Add "Delete" Event
    $('.remove-creator').click(function(e) {
        e.preventDefault();
        $(this).parent().remove();
        // Decrease the index of one due to the removed item
        // $creatorCollectionHolder.data('index', --index);
        return false;
    });
}