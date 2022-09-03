var cr = document.getElementsByClassName("cr");

var room;
var nam;
function ONLOAD() {
  room = document.getElementById("room");
  nam = document.getElementById("name");
}

function replaceAll(str, find, replace) {
  return str.replace(new RegExp(find, "g"), replace);
}

function CR() {
  const room_s = replaceAll(room.value, " ", "-");
  const name_s = replaceAll(nam.value, " ", "-");
  window.location.replace("./create.php?room=" + room_s + "&name=" + name_s + "&cr=");
}

function JN() {
  const room_s = replaceAll(room.value, " ", "-");
  const name_s = replaceAll(nam.value, " ", "-");
  window.location.replace("./create.php?room=" + room_s + "&name=" + name_s + "&jn=");
}

