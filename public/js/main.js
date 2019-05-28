var postId = 0;
var postBodyElement = null;

function getModalBody() //get the existing post text and load it into modal body
{
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid']; //set the postid var
    $('#post-body').val(postBody);
}

$(document).ready(function(){ //only allow running of function when the document is fully loaded
    $('#modal-save').click(function() //if savechanges button is clicked
    {
        $.ajax({ //pepare an ajax object
            method: 'POST',
            url: url,
            data: {body: $('#post-body').val(), postId: postId, _token: token}
        })
        .done(function(msg)
        {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
    });
});