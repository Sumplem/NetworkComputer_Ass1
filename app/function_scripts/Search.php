<script>
const searchContact = document.getElementById("searchContact")
const contactListContainer = document.getElementById("contactListContainer");

const searchFriend = document.getElementById("searchFriend")
const friendListContainer = document.getElementById("friendListContainer");

searchContact.onkeyup = function() {
    str = searchContact.value;

    if (str.length == 0) {
        contactListContainer.innerHTML = "";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                contactListContainer.innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/searchContact?searchContact=" + str, true);
        xmlhttp.send();
    }
}

searchFriend.onkeyup = function() {
    str = searchFriend.value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            friendListContainer.innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/friendList?friend=" + str, true);
    xmlhttp.send();
}

</script>