let inputs = document.getElementById('indexForm').elements,
    error = document.getElementById('error');

function onFormSubmit() {
  event.preventDefault();

  let request = new XMLHttpRequest(),
      url = "api/user/read.php/" + inputs['pseudo'].value;

  request.open('GET', url);
  request.onload = function() {
    let response = JSON.parse(request.response);

    if (request.status == 404)
      error.innerHTML = "Ce pseudo ne correspond à aucun compte";
    else if (response['data']['password'] != SHA1(inputs['password'].value))
      error.innerHTML = "Mot de passe incorrect";
    else {
      document.cookie = "IMMUserId=" + response['data']['id'];
      window.location = 'home.php';
    }
  }
  request.send(inputs['pseudo'].value);
}