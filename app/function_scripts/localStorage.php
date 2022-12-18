<script>
function saveMessage(other_id,type,message){
    var ID = '<?php echo $_SESSION['login']['ID'] ?>';

    var messageArr = JSON.parse(localStorage.getItem(ID) || "[]");

    var flag = true;

    for (let i = 0; i < messageArr.length; i++) {
        if(messageArr[i].id == other_id){
            flag = false;
            break;
        }
    }

    if(flag) {
        messageArr.push({id: other_id, data: []});
    }
    
    messageArr.forEach(function(element, index, arr) {
        if(element.id == other_id){
            isExits = true;
            element.data.push({type: type,message: message});
        }
    });

    localStorage.setItem(ID, JSON.stringify(messageArr));
}

function loadMessage(other_id) {
    var messageArr = JSON.parse(localStorage.getItem(ID) || "[]");
    var messageDisplay = document.getElementById('messageDisplay');
    messageDisplay.innerHTML = "";

    for (let i = 0; i < messageArr.length; i++) {
        //console.log(messageArr[i].id);
        if(messageArr[i].id == other_id){
            //console.log(messageArr[i].id);
            var firts = true;
            var friendChatLast = false;
            var friendChatCurrent = false;

            var str = "";

            messageArr[i].data.forEach(element => {
                //console.log(messageArr[i].id);
                if(firts) {
                    if(element.type == 'friend') {
                        friendChatCurrent = true;
                    }else {
                        friendChatCurrent = false;
                    }

                    if(friendChatCurrent) {
                        str += '<div class="messageBox">';
                        str += '<div class="messageAvatar"></div>';
                        str += '<div class="messageContainer">';
                        str += '<div class="messageRow">';
                        str += '<div>' + element.message + '</div></div>';
                    }else {
                        str += '<div class="messageBox myMsg">';
                        str += '<div class="messageContainer myMsg">';
                        str += '<div class="messageRow myMsg">';
                        str += '<div>' + element.message + '</div></div>';
                    }

                    friendChatLast = friendChatCurrent;
                    firts = false;
                }else {
                    if(element.type == 'friend') {
                        friendChatCurrent = true;
                    }else {
                        friendChatCurrent = false;
                    }

                    if(friendChatCurrent != friendChatLast) {
                        str += '</div></div>';
                        if(friendChatCurrent) {
                            str += '<div class="messageBox">';
                            str += '<div class="messageAvatar"></div>';
                            str += '<div class="messageContainer">';
                            str += '<div class="messageRow">';
                            str += '<div>' + element.message + '</div></div>';
                        }else {
                            str += '<div class="messageBox myMsg">';
                            str += '<div class="messageContainer myMsg">';
                            str += '<div class="messageRow myMsg">';
                            str += '<div>' + element.message + '</div></div>';
                        }

                    }else if(friendChatCurrent){
                        str += '<div class="messageRow">';
                        str += '<div>' + element.message + '</div></div>'
                    }else {
                        str += '<div class="messageRow myMsg">';
                        str += '<div>' + element.message + '</div></div>';
                    }
                    friendChatLast = friendChatCurrent;
                }
            });

            messageDisplay.innerHTML = str;

            messageDisplay.scrollTop = messageDisplay.scrollHeight; 
            return;
        }
    }
}
</script>