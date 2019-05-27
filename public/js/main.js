function getModalBody() //get the existing post text and load it into modal body
{
    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
    $('#post-body').val(postBody);
}