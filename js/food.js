let tBody = document.getElementById('foodTBody'),
    inputs = document.getElementById('foodForm').elements,
    error = document.getElementById('error');

let params = new URLSearchParams(document.location.search.substring(1)),
    rowsNumber = 10,
    firstRow = !params.get('page') ? 0 : (params.get('page')-1)*rowsNumber;

let request = new XMLHttpRequest(),
    url = "api/food/read.php";

request.open("POST", url);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
request.onreadystatechange = function() {
  if (this.readyState === XMLHttpRequest.DONE) {
    let response = JSON.parse(request.response);

    response['data'].forEach(element => {
      let tr = document.createElement('tr');

      Object.entries(element).forEach(field => {
        let td = document.createElement('td');
        
        if (field[0] == 'img') {
          let img = document.createElement('img');

          td.className = "foodImage";
          img.src = "img/food/" + field[1] + ".png";

          td.appendChild(img);
        }
        else
          td.innerHTML = field[1];
          
        tr.appendChild(td);
      });

      tBody.appendChild(tr);
    });
  }
}
request.send("firstRow=" + firstRow + "&rowsNumber=" + rowsNumber);

function onFormSubmit() {
  event.preventDefault();

  let request = new XMLHttpRequest(),
      url = "api/food/read.php/" + inputs['name'].value;

  let paramToSend = "";

  request.open('GET', url);
  request.onload = function() {
    if (request.status == 404) {
      let requestPOST = new XMLHttpRequest(),
          url = "api/food/create.php";

      Object.entries(inputs).forEach(input => {
        if (!parseInt(input[0]+1, 10) && input[0] != 'userfile' && input[0] != 'foodButton') {
          paramToSend += input[0] + "=" + input[1].value;

          if (input[0] != 'category')
            paramToSend += "&";
        }
      });

      requestPOST.open("POST", url);
      requestPOST.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      requestPOST.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
          let response = JSON.parse(requestPOST.response);

          error.innerHTML = response['message'];
          console.log(response['response']);
        }
      }
      requestPOST.send(paramToSend);
    }
    else {
      error.innerHTML = "Cet aliment est déjà présent dans la base de donnée";
      window.location = "food.php#foodFormContainer?page=" + params.get('page');
    }
  }
  request.send();
}