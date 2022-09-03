<html>
  <head>
    <title>VaneChat | Chat for free online</title>

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta
      name="description"
      content="Chat online free and Private. Created By Bonginkosi Khumalo, Code zero"
    />
    <meta
      name="keywords"
      content="Bonginkosi,Khumalo,VaneChat,Chat,Free,codezero,private,online,Vane,and"
    />

    <!-- CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- <link rel="stylesheet" href="lib/hexicon/css/hexicon.css"/> -->
    <link rel="stylesheet" href="lib/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="src/css/main.css" />
  </head>
  <body onload="ONLOAD()">
    <div class="content">
      <div class="logo">
        <img src="src/img/logo.png" alt="ChatMe Logo" />
      </div>
      <div class="cr-room">
        <input
          type="text"
          placeholder="Private Key"
          name="room"
          class="center"
          id="room"
        />
        <input
        type="text"
        placeholder="Name"
        name="name"
        class="center p"
        id="name"
      />
        <button class="cr" onclick="CR()">Create Room</button><br />
        <button class="jn" onclick="JN()">Join Room</button>
      </div>
      <div class="explanation">
        <p class="center">
          VaneChat is WebApp for chatting Privately.<br />
          When a massege is receved it is imediatly deleted from the
          database.<br />
          When you close your window the room is automatically deleted.<br />
          Created By Bonginkosi Khumalo<br />
        </p>
      </div>
    </div>
    <!-- JS -->
    <script src="src/js/main.js"></script>
  </body>
</html>
