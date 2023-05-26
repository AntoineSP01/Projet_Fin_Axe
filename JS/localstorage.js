window.addEventListener('beforeunload', function() {
    var message = document.getElementById('message').value;
    var tag = document.getElementById('choix').value;
    localStorage.setItem('savedMessage', message);
    localStorage.setItem('savedTag', tag);
});

window.addEventListener('load', function() {
    var savedMessage = localStorage.getItem('savedMessage');
    var savedTag = localStorage.getItem('savedTag');
    if (savedMessage) {
        document.getElementById('message').value = savedMessage;
    }
    if (savedTag) {
        document.getElementById('choix').value = savedTag;
    }
});



