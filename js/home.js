let tBody = document.getElementById('homeTBody');
let user = getCookie('IMMUserId');

let request = new XMLHttpRequest();
let url = "api/meal/read.php/" + user;

request.open('GET', url);
request.onload = function() {
  let response = JSON.parse(request.response);

    response['data'].forEach(element => {
      let tr = document.createElement('tr');

      Object.keys(element).forEach(key => {
        let td = document.createElement('td');
        td.innerHTML = element[key];
        tr.appendChild(td);
      });

      tBody.appendChild(tr);
    });
}
request.send(user);