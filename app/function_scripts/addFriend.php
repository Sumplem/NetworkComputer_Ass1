<script>
function addFriend(contact){
    id = contact.getAttribute('value');
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loadFriend();
            loadFriendRequest();
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/addFriend?id=" + id, true);
    xmlhttp.send();

    if(contact.innerHTML=='Accept'){
        document.getElementById('buttonHolder').innerHTML = "You have accept!";
    }else {
        document.getElementById('buttonHolder').innerHTML = "You have send friend request!";
    }
}

function changeInner(str){
    document.getElementById('buttonHolder').innerHTML = str;
}
</script>