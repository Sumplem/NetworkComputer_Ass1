<script>
    function setNotify(id) {
        var friendList = document.getElementsByClassName('friend');

        for (let i = 0; i < friendList.length; i++) {
            const friend = friendList[i];

            if(friend.getAttribute('value') == id) {
                friend.getElementsByClassName('avatar')[0].classList.add('notify');
                return;
            }
            
        }
    }

    function removeNotify(obj) {
        obj.getElementsByClassName('avatar')[0].classList.remove('notify');
    }
</script>