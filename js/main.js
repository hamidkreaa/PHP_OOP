/* main.js */

$(document).ready(function () {
    // set the current year to the footer
    $('#currentyear').text(new Date().getFullYear());
});

function getHttpPath() {
    var path = window.location.pathname;
    var pathArray = path.split("/");
    pathArray.pop();
    if (pathArray[pathArray.length - 1] == "site") {
        pathArray.pop();
    }
    return pathArray.join("/");
}

function doLogout() {
    var answer = confirm("Wollen Sie sich wirklich abmelden?");
    if (answer == true) {
        var url = getHttpPath() + "/inc/db_viewer.php?table=system&action=logout";
        window.location.assign(url);
        return true;
    } else {
        return false;
    }
}

function showUsers() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=users&action=list";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function editUser(id) {
    var url = getHttpPath() + "/inc/db_viewer.php?table=users&action=edit&id=" + id;
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function delUser(id) {
    var answer = confirm("Wollen Sie diesen Benutzer wirklich löschen?");
    if (answer == true) {
//        var url = getHttpPath() + "/inc/db_viewer.php?table=system&action=logout";
//        window.location.assign(url);
        return true;
    } else {
        return false;
    }
}

function newUser() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=users&action=new";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function showCategories() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_categories&action=list";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function editCategory(id) {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_categories&action=edit&id=" + id;
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function delCategory(id) {
    var answer = confirm("Wollen Sie diese Kategorie wirklich löschen?");
    if (answer == true) {
//        var url = getHttpPath() + "/inc/db_viewer.php?table=system&action=logout";
//        window.location.assign(url);
        return true;
    } else {
        return false;
    }
}

function newCategory() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=new";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function showLocations() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=list";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function editLocation(id) {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=edit&id=" + id;
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function delLocation(id) {
    var answer = confirm("Wollen Sie diese Kategorie wirklich löschen?");
    if (answer == true) {
//        var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=logout";
//        window.location.assign(url);
        return true;
    } else {
        return false;
    }
}

function newLocation() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=new";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function showCourses() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses&action=list";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function editCourse(id) {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses&action=edit&id=" + id;
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}

function delCourse(id) {
    var answer = confirm("Wollen Sie dieses Seminar wirklich löschen?");
    if (answer == true) {
//        var url = getHttpPath() + "/inc/db_viewer.php?table=courses_locations&action=logout";
//        window.location.assign(url);
        return true;
    } else {
        return false;
    }
}

function newCourse() {
    var url = getHttpPath() + "/inc/db_viewer.php?table=courses&action=new";
    $.get(url, function (data, status) {
        $("#dyncontent").html(data);
    });
}
