<script>
var messageDisplay = document.getElementById('messageDisplay');

var peer = new Peer();
var conn = null;

var ID = '<?php echo $_SESSION['login']['ID'];?>';
var currentChatID = null;
var connectID = null;

peer.on('open', function(id) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/setP2pID?id=" + id, true);
    xmlhttp.send();
});

peer.on('connection',function(connData){
    conn = connData;

    // Receive messages
    conn.on('data', function(message) {
        if(message.length == 32){
            connectID = message;
            if(currentChatID == connectID) {
                document.getElementById('status').innerHTML = 'connect';
            }
        }else{
            var data = queryMessage(message);
            saveMessage(data['id'],'friend',data['message']);
            if(data['id'] == currentChatID) {
                loadMessage(currentChatID);
            }else {
                setNotify(data['id']);
            }
        }
    });

    //document.getElementById('status').innerHTML = 'connect';

    //Send messages
    conn.on('open',function(){
        conn.send(ID);
    });
});

function connectPeer(obj){
    var id = obj.getAttribute('value');
    if(currentChatID == id) {
        return;
    }

    document.getElementById('status').innerHTML = '';

    currentChatID = null;
    var xmlhttp = new XMLHttpRequest();
    var otherID = null;
    

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            otherID = this.responseText;
    
            conn = peer.connect(otherID);
    
            conn.on('open', function() {
                currentChatID = id;

                // Receive messages
                conn.on('data', function(message) {
                    if(message.length == 32){
                        connectID = message;
                        if(currentChatID == connectID) {
                            document.getElementById('status').innerHTML = 'connect';
                        }
                    }else{
                        var data = queryMessage(message);
                        saveMessage(data['id'],'friend',data['message']);
                        if(data['id'] == currentChatID) {
                            loadMessage(currentChatID);
                        }else {
                            setNotify(data['id']);
                        }
                    }
                });
    
                //Send messages
                conn.send(ID);
            });
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/getP2pID?id=" + id, true);
    xmlhttp.send();
}

function sendMessage(){
    if(currentChatID == null){
        return;
    }

    var message = document.getElementById("inputMessage").value;
    saveMessage(currentChatID,'you',message);
    conn.send(ID + ':' + message);
    document.getElementById("inputMessage").value = '';
    loadMessage(currentChatID);
}

function queryMessage(message) {
    var data = [];
    data['id'] = message.substring(0,32);
    data['message'] = message.substring(33);
    return data;
}

</script>