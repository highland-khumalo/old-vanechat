function get(selector, root = document) {
  return root.querySelector(selector);
}

const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const myname = "hello";


function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

var room;
var username;
fetch("./room.php")
  .then((response) => {
    return response.text();
  })
  .then((text) => {
    room = text;
    console.log(text);
  });
fetch("./user.php")
  .then((response) => {
    return response.text();
  })
  .then((text) => {
    username = text;
    console.log(text);
  });

msgerForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const msgText = msgerInput.value;
  if (!msgText) return;

  appendMessage(username, "none", "right", msgText);
  var stat;
  fetch("./ms.php?msg=" + msgText + "&rom=" + room + "&usrname=" + username)
    .then((response) => {
      return console.log(response.text());
    })
    .then((text) => {
      stat = text;
      console.log(text);
    });
  sleep(400)
  fetch("./ms.php?rom=" + room + "&usrname=" + username + "&clear")
    
  msgerInput.value = "";
});

function appendMessage(name, img, side, text) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
}
// Utils

function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}

function receve() {
  fetch("/rooms/" + room + "/room.json")
    .then((response) => {
      return response.text();
    })
    .then((text) => {
      var chat = text;
      console.log(text);
      if (chat !== "/" && chat !== "") {
        const masseges = new Set(chat.split("\n"));
        for (let massege of masseges) {
          var ms = massege.split("/");
          if (ms[1] != username && ms[1] !== "" && ms[0] !== "") {
            appendMessage(ms[1], "none", "left", ms[0]);
          }
        }
      }
    });
}

window.setInterval(receve, 500);
