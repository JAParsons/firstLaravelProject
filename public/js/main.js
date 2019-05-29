var postId = 0;
var postBodyElement = null;

function getModalBody() //get the existing post text and load it into modal body
{
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid']; //set the postid var
    $('#post-body').val(postBody);
}

//alternative onclick method $('#modal-save').click(function()
$(document).ready(function(){ //only allow running of function when the document is fully loaded
    $('#modal-save').on('click', function() //if savechanges button is clicked
    {
        $.ajax({ //pepare an ajax call
            method: 'POST',
            url: urlEdit,
            data: {body: $('#post-body').val(), postId: postId, _token: token}
        })
        .done(function(msg)
        {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
    });

    $('.like').on('click', function(event) //if like button is clicked
    {
        event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset['postid']; //set the postid var
        var isLike = event.target.previousElementSibling == null; //if there is no sibling element before the 'like'
        console.log(isLike);

        $.ajax({ //prepare an ajax call
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, postId: postId, _token: token}
        })
        .done(function()
        {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Liked' : 'Like' : event.target.innerText == 'Dislike' ? 'Disliked' : 'Dislike';
            if(isLike)
            {
                event.target.nextElementSibling.innerText = 'Dislike';
            }
            else
            {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
    });
});
