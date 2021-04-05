let inputs = document.getElementById('signupForm').elements,
    error = document.getElementById('error');

function onFormSubmit() {
  event.preventDefault();

  let request = new XMLHttpRequest(),
      url = "api/user/read.php/" + inputs['pseudo'].value;
  
  request.open('GET', url);
  request.onload = function() {
    if (request.status == 404) {
      if (inputs['password'].value == inputs['passwordAgain'].value) {
        let paramToSend = "";

        Object.entries(inputs).forEach(input => {
          if (!parseInt(input[0]+1, 10) && input[0] != 'passwordAgain' && input[0] != 'signupButton') {
            paramToSend += input[0] + "=" + input[1].value;

            if (input[0] != 'sport')
              paramToSend += "&";
          }
        });

        let requestPOST = new XMLHttpRequest(),
            url = "api/user/create.php";

        requestPOST.open("POST", url);
        requestPOST.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        requestPOST.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE) {
            response = JSON.parse(requestPOST.response);

            document.cookie = "IMMUserId=" + parseInt(response['data']['id']);
            window.location = 'home.php';
          }
        }
        requestPOST.send(paramToSend);
      }
      else {
        error.innerHTML = "Les mots de passe entrés ne correspondent pas";
        window.location = "signup.php#signupContainer";
      }
    }
    else {
      error.innerHTML = "Ce pseudo est déjà associé à aucun compte";
      window.location = "signup.php#signupContainer";
    }
  }
  request.send(inputs['pseudo'].value);
}