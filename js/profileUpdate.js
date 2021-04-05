let inputs = document.getElementById('profileUpdateForm').elements,
    error = document.getElementById('error'),
    pseudo = "";

let request = new XMLHttpRequest(),
    url = "api/user/read.php/" + getCookie('IMMUserId');

request.open('GET', url);
request.onload = function() {
  let response = JSON.parse(request.response);

  pseudo = response['data']['pseudo'];

  Object.entries(response['data']).forEach(input => {
    if (input[0] != 'id' && input[0] != 'password')
      inputs[input[0]].value = input[1];
  });
}
request.send(getCookie('IMMUserId'));

function onFormSubmit() {
  event.preventDefault();

  let requestGET = new XMLHttpRequest(),
      url = "api/user/read.php/" + inputs['pseudo'].value;
  
  requestGET.open('GET', url);
  requestGET.onload = function() {
    let responseGET = JSON.parse(requestGET.response);

    if (requestGET.status == 404 || responseGET['data']['pseudo'] == pseudo) {
      if (inputs['password'].value == inputs['passwordAgain'].value) {
        let paramToSend = "";

        Object.entries(inputs).forEach(input => {
          if (!parseInt(input[0]+1, 10) 
              && input[0] != 'userfile' 
              && input[0] != 'passwordAgain' 
              && input[0] != 'signupButton') {
            paramToSend += input[0] + "=" + input[1].value;

            if (input[0] != 'sport')
              paramToSend += "&";
          }
        });

        let requestPOST = new XMLHttpRequest();
        let url = "api/user/update.php/" + getCookie('IMMUserId');

        requestPOST.open("POST", url);
        requestPOST.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        requestPOST.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE) {
            window.location = 'profile.php#profileContainer';
          }
        }
        requestPOST.send(paramToSend);
      }
      else {
        error.innerHTML = "Les mots de passe entrés ne correspondent pas";
        window.location = "profileUpdate.php#profileUpdateContainer";
      }
    }
    else {
      error.innerHTML = "Ce pseudo est déjà associé à un compte";
      window.location = "profileUpdate.php#profileUpdateContainer";
    }
  }
  requestGET.send();
}