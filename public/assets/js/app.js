
document.addEventListener('DOMContentLoaded',function(){
    let creator = document.createElement('button');
    creator.classList.add('btn');
    //let creatorList = document.querySelector('.creator').appendChild(creator);
    let collectionHolder = document.querySelector('div.creatorForms').appendChild(creator)

    //collectionHolder.;
    console.log(creator)
    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    //collectionHolder.data('index', collectionHolder.find('input').length);
    collectionHolder.dataset.index = document.querySelector('input').length
    creator.addEventListener('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm(collectionHolder, creator);
    })
    }
)

function addTagForm(collectionHolder, creatorList) {
    // Get the data-prototype explained earlier
    let prototype = collectionHolder.data('prototype');

    // get the new index
    let index = collectionHolder.data('index');

    let creatorForms = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    creatorForms = creatorForms.replace(/__name__/g, index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
     creatorList = document.querySelector('.creator').appendChild(creatorForms);
    creatorList.before(creatorList);

}

