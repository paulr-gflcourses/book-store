function addOption(distListId, srcListId, inputFieldId) {
    var srcList = document.getElementById(srcListId);
    var selectedItem = srcList.options[srcList.selectedIndex];
    var inputField = document.getElementById(inputFieldId);
    var distList = document.getElementById(distListId);

    if ((inputField.value != "") || (selectedItem.value != "")) {
        var option = document.createElement("option");
        if ((inputField.value == "") || (inputField.value === selectedItem.text)) {
            option.value = selectedItem.value;
            option.text = selectedItem.text;
            srcList.selectedIndex = 0;
            inputField.value = "";
        } else {
            option.text = inputField.value;
            inputField.value = "";
            srcList.selectedIndex = 0;
        }
        distList.add(option);
    }

}

function removeOption(itemId) {
    var x = document.getElementById(itemId);
    x.remove(x.selectedIndex);
}

function selectLists() {
    var authors = document.getElementById("book-authors");
    var optionsAuth = authors.options;
    for (var i = 0; i < optionsAuth.length; i++) {
        optionsAuth[i].removeAttribute("selected");
        optionsAuth[i].setAttribute("selected","selected");
    }

    var genres = document.getElementById("book-genres");
    var optionsGenres = genres.options;
    for (var i = 0; i < optionsGenres.length; i++) {
        optionsGenres[i].removeAttribute("selected");
        optionsGenres[i].setAttribute("selected","selected");
    }
}


function saveBook(modal) {
    selectLists();
    //var form = $('#book');
    var form = document.getElementById("book");
    var form = document.querySelector("form[name=book]");
    var formData = new FormData(form);
    formData.append("action", "book-save");
    var formPostData  = $("#book").serialize();

    $.ajax({
        url: "controller.php",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {

            $('#editModal').modal('hide');
            updateAuthorsGenresList();
            updateBooksTable();

        },
        error: function (xhr, str) {
            alert('Возникла ошибка!');
        }
    });
}

function updateBooksTable() {

    var authorList = document.getElementById("authors");
    var idauthor = authorList.options[authorList.selectedIndex];
    var genreList = document.getElementById("genres");
    var idgenre = genreList.options[genreList.selectedIndex];

    idauthor = (idauthor) ? idauthor : '';
    idgenre = (idgenre) ? idgenre : '';

    $.ajax({
        url: "controller.php",
        type: 'POST',
        data: {"action": "books-list", "authors": idauthor.value, "genres": idgenre.value},
        success: function (data) {
            $("#tbody").html(data);
        },
    });
    return false;
}

function removeBooks() {
    var formData = new FormData(document.getElementById("books"));
    formData.append("action", "books-remove");

    $.ajax({
        url: "controller.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            updateBooksTable();
        },
    });
    return false;
}

function getBookEditForm(idbook, modal) {
    $.ajax({
        url: "book-edit.php",
        type: 'GET',
        data: {"idbook": idbook},
        success: function (data) {
            modal.find('.modal-body').html(data)
        },
    });
    return false;
}

function updateAuthorsGenresList() {
    $.ajax({
        url: "controller.php",
        type: 'POST',
        data: {"action": "authors-list"},
        success: function (data) {
            $("#authors").html(data);
        },
    });

    $.ajax({
        url: "controller.php",
        type: 'POST',
        data: {"action": "genres-list"},
        success: function (data) {
            $("#genres").html(data);
        },
    });
    return false;
}