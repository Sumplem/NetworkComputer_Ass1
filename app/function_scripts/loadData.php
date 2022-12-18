<script>
function loadFriendRequest() {
    const obj = document.getElementById('friendRequestContainer');
    var id = '<?php echo $_SESSION['login']['ID']?>';
    obj.innerHTML = 'aaaa';
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            obj.innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/displayFriendRequest?id=" + id, true);
    xmlhttp.send();
}

function loadFriend() {
    const friendListContainer = document.getElementById("friendListContainer");
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            friendListContainer.innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/friendList?friend=", true);
    xmlhttp.send();
}

loadFriend();
loadFriendRequest();
</script>