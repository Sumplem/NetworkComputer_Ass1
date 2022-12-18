<script>
function displayInfo(obj) {
    var id = obj.getAttribute('value');
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('infomation').innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/displayInfo?id=" + id, true);
    xmlhttp.send();
}

function displayCurrentChat(obj) {
    var id = obj.getAttribute('value');
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('contactName').innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "<?php echo _WEB_ROOT;?>/Home/getName?id=" + id, true);
    xmlhttp.send();
}
</script>