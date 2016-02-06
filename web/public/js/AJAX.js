//Appel AJAX pour la connexion
function Login() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "/account/Login", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Login");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var tabResult = xmlhttp.responseText;
            //Action
        }
    }
}

//Appel AJAX pour la creation de compte
function CreateUser() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "/account/CreateUser", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=CreateUser");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var tabResult = xmlhttp.responseText;
            //Action
        }
    }
}

//Appel AJAX pour la creation d'entreprise
function CreateBusiness() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "/account/CreateBusiness", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=CreateBusiness");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var tabResult = xmlhttp.responseText;
            //Action
        }
    }
}