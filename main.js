var addButton = document.getElementById('addButton');
var addForm = document.getElementById('addForm');
var editForm = document.getElementById("editForm");
var booksCollection = document.querySelectorAll("button#editBtn");
var editAuthors = document.getElementById('editAuthors');
var editAuthorsForm = document.getElementById('editAuthor');
var addAuthors = document.getElementById('addAuthors');
var addAuthorsForm = document.getElementById('addAuthor');
var filterListAuthor = document.getElementById('filterListAuthor');
var filterListName = document.getElementById('filterListName');
var filterListDate = document.getElementById('filterListDate');
var filterAuthorFill = document.getElementById('filter-by-author');
var filterNameFill = document.getElementById('filter-by-name');
var filterDateFill = document.getElementById('filter-by-date');
var fill = document.getElementById('bookName');
filterListAuthor.addEventListener('click', function () {
    filterAuthorFill.style.display = 'flex';
    filterDateFill.style.display = 'none';
    filterNameFill.style.display = 'none';
})
filterListName.addEventListener('click', function () {
    filterNameFill.style.display = 'flex';
    filterDateFill.style.display = 'none';
    filterAuthorFill.style.display = 'none';
})
filterListDate.addEventListener('click', function () {
    filterDateFill.style.display = 'flex';
    filterNameFill.style.display = 'none';
    filterAuthorFill.style.display = 'none';
})
editAuthors.addEventListener('click', function(){
    editAuthorsForm.style.display = 'flex';
})
addButton.addEventListener('click', function(){
    addForm.style.display = "flex";
})

addAuthors.addEventListener('click', function(){
    addAuthorsForm.style.display = 'flex';
})
function getUrlParameter(url, parameter) {
    parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
    var results = regex.exec('?' + url.toLowerCase().split('?')[1]);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

function setUrlParameter(url, key, value) {

    var baseUrl = url.split('?')[0],
        urlQueryString = '?' + url.split('?')[1],
        newParam = key + '=' + value,
        params = '?' + newParam;

    if (urlQueryString) {
        var updateRegex = new RegExp('([\?&])' + key + '[^&]*');
        var removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

        if (typeof value === 'undefined' || value === null || value === '') {
            params = urlQueryString.replace(removeRegex, "$1");
            params = params.replace(/[&;]$/, "");

        } else if (urlQueryString.match(updateRegex) !== null) {
            params = urlQueryString.replace(updateRegex, "$1" + newParam);

        } else {
            params = urlQueryString + '&' + newParam;
        }
    }

    params = params === '?' ? '' : params;

    return baseUrl + params;
}

var pageSelect = document.getElementById('page-select');
var currentPage = getUrlParameter(window.location.href, 'page');
if (currentPage) {
    pageSelect.value = currentPage;
}
pageSelect.addEventListener('change', function (event) {
    var value = event.target.value;
    window.location.href = setUrlParameter(window.location.href, 'page', value);
});

var addBookClickHandler = function (book) {
    book.addEventListener('click', function(){
        editForm.style.display = "flex";
    })
}
for (var i = 0; i <= booksCollection.length - 1; i++) {
    addBookClickHandler(booksCollection[i]);
}