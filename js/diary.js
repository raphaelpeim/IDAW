let tBody = document.getElementById('diaryTBody'),
    inputs = document.getElementById('diaryForm').elements,
    error = document.getElementById('error');

let params = new URLSearchParams(document.location.search.substring(1)),
    rowsNumber = 10,
    firstRow = !params.get('page') ? 0 : (params.get('page')-1)*rowsNumber;

let request = new XMLHttpRequest(),
    url = "api/meal/read.php/" + getCookie('IMMUserId');

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
request.send("diary=true&firstRow=" + firstRow + "&rowsNumber=" + rowsNumber);

function onFormSubmit() {
  event.preventDefault();

  let paramToSend = "";

  let requestPOST = new XMLHttpRequest(),
      url = "api/meal/create.php/" + getCookie('IMMUserId');

  Object.entries(inputs).forEach(input => {
    if (!parseInt(input[0]+1, 10) && input[0] != 'diaryButton') {
      paramToSend += input[0] + "=" + input[1].value;

      if (input[0] != 'date')
        paramToSend += "&";
    }
  });

  requestPOST.open("POST", url);
  requestPOST.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  requestPOST.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE) {
      let response = JSON.parse(requestPOST.response);

      error.innerHTML = response['message'];
    }
  }
  requestPOST.send(paramToSend);
}