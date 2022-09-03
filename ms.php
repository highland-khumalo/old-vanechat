<?php
if (isset($_GET['msg']) && isset($_GET['rom'])) {
    # send = "massege/name"
    $send = $_GET['msg'] . "/" . $_GET['usrname'];

    $room_dir = "rooms/" . $_GET['rom'] . "/";
    echo $room_dir;
    file_put_contents($room_dir .  "room.json", $send);
    echo "True";
}

if (isset($_GET['rom']) && isset($_GET['clear'])) {
    # send = "massege/name"

    $room_dir = "rooms/" . $_GET['rom'] . "/";
    echo $room_dir;
    file_put_contents($room_dir .  "room.json", "");
    echo "True";
}