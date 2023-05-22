window.addEventListener('beforeunload', function() {
    var message = document.getElementById('message').value;
    localStorage.setItem('savedMessage', message);
});

window.addEventListener('load', function() {
    var savedMessage = localStorage.getItem('savedMessage');
    if (savedMessage) {
    document.getElementById('message').value = savedMessage;
    }
});

window.addEventListener('beforeunload', function() {
    var tag = document.getElementById('tag').value;
    localStorage.setItem('savedTag', tag);
});

window.addEventListener('load', function() {
    var savedTag = localStorage.getItem('savedTag');
    if (savedTag) {
    document.getElementById('tag').value = savedTag;
    }
});

document.getElementById('confirmer').addEventListener('click', function() {
    localStorage.removeItem('savedMessage');
});