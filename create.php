<?php
include "hexicon.php";

if (isset($_GET['room']) && isset($_GET['name']) && isset($_GET['cr'])) {
    $room = $_GET['room'];
    $name = $_GET['name'];
    echo "Creating Room: " . $room . "<br/>";
    
    $room_dir = "rooms/" . $room . "/";
    mkdir($room_dir);
    
    $contents = "user1:$name";
    file_put_contents($room_dir . "cha.json", $contents); 
    # sleep(2);
    file_put_contents($room_dir . "room.json", ""); 
    setcookie("user", $name, time() + 86400, "/");
    setcookie("room", $room, time() + 86400, "/");
}

if (isset($_GET['room']) && isset($_GET['name']) && isset($_GET['jn'])) {
    $room = $_GET['room'];
    $name = $_GET['name'];
    echo "Joining Room: " . $room;

    $room_dir = "rooms/" . $room . "/";
    if (is_dir($room_dir)) {
        $number = random_int(1, 999);
        $chat = file_get_contents($room_dir . "chat.json"); 
        $chat = $chat . "\nuser$number:$name";
        file_put_contents($room_dir . "cha" . ".json", $chat);
        file_put_contents($room_dir . "room" . ".json", "");
        setcookie("user", $name, time() + 86400, "/");
        setcookie("room", $room, time() + 86400, "/");
    }
}
sleep(2);
?>
<script>
window.location.replace("http://localhost/vane.php");
</script>