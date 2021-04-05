let h1 = document.getElementById('profileName'),
    dl = document.getElementById('profileInformation'),
    userInformation = {
      'pseudo': "Pseudo",
      'age': "Tranche d'âge",
      'sex': "Sexe",
      'sport': "Pratique sport",
      'phone': "Téléphone",
      'mail': "E-mail"
    };

let request = new XMLHttpRequest();
let url = "api/user/read.php/" + getCookie('IMMUserId');

request.open('GET', url);
request.onload = function() {
  let response = JSON.parse(request.response);

  h1.innerHTML = response['data']['name_f'] + " " + response['data']['name_l'];

  Object.entries(userInformation).forEach(information => {
    let dt = document.createElement('dt'),
        dd = document.createElement('dd');

    dt.className = "col-sm-3";
    dt.style.textAlign = "left";
    dt.innerHTML = information[1];

    dd.className = "col-sm-9";
    dd.style.textAlign = "left";
    dd.innerHTML = response['data'][information[0]];

    dl.appendChild(dt);
    dl.appendChild(dd);
  });
}
request.send(getCookie('IMMUserId'));