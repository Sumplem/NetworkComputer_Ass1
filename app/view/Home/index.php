<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ChatChit</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Main.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Tooltip.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/peerjs@1.3.2/dist/peerjs.min.js"></script>
</head>
<body>
    <div id="menu">
        <div id="accountButton" class="icon tooltip">
            <span class="material-icons">
            person
            </span>
            <div class="tooltiptext right">Account</div>
        </div>
        <div id="friendListButton" class="icon tooltip active">
            <span class="material-icons">
            contacts
            </span>
            <div class="tooltiptext right">Friend list</div>
        </div>
        <div id="addFriendButton" class="icon tooltip">
            <span class="material-icons">
            person_add
            </span>
            <div class="tooltiptext right">Add friends</div>
        </div>
    </div>
    <div id="functions">
        <div id="account" class="function">
            <div class="avatar"></div>
            <div class="name"><?php echo $User['Name'];?></div>
            <a href="<?php echo _WEB_ROOT;?>/Login/logout">
                <button class="modButton" >Logout</button>
            </a>
        </div>

        <div id="friendList" class="function activeFunction">
            <div class="title">Friend list</div>
            <input id="searchFriend" type="search" class="searchBar" placeholder="Search" name='searchFriend'></input>
            <div id="friendListContainer" class="container">
                <!-- <div class="friend">
                    <div class="avatar"></div>
                    <div class="name">Luc Gia Hung</div>
                </div> -->
            </div>
        </div>

        <div id="addFriend" class="function">
            <div class="title">Add friend</div>
            <input id="searchContact" type="search" class="searchBar" placeholder="Search"></input>
            <div id="contactListContainer" class="container"></div>
            <div class="title" id='frquestTitle'>Friend request</div>
            <div id="friendRequestContainer" class="container"></div>
        </div>
    </div>
    <div id="chatDisplay">
        <div id="currentContact">
            <div id="contactAvatar"></div>
            <div class="contactTitle">
                <div id="contactName">Choose friend to start chat</div>
                <div id="status"></div>
            </div>
        </div>
        <div id="messageDisplay"></div>
        <div id="functionsBar">
            <div id="messageSendForm" >
                <input type="text" id="inputMessage" placeholder="Input something...">
                <button id="sendMessageButton" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>
    <div id="infomation"></div>
</body>
<script src="<?php echo _WEB_ROOT ?>/app/view/scripts/FunctionsControl.js"></script>
</html>

<?php
require_once('app/function_scripts/setNotify.php');
require_once('app/function_scripts/localStorage.php');
require_once('app/function_scripts/p2pChat.php');
require_once('app/function_scripts/loadData.php');
require_once('app/function_scripts/Search.php');
require_once('app/function_scripts/displayInfo.php');
require_once('app/function_scripts/addFriend.php');
?>