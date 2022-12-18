function functionsControl(buttons, functions) {
    var buts = [];
    var funcs = [];

    buttons.forEach(element => {
        buts.push(document.getElementById(element));
    });

    functions.forEach(element => {
        funcs.push(document.getElementById(element));
    });

    for (let index = 0; index < buts.length; index++) {
        buts[index].onclick = function(){
            buts[index].classList.add('active');
            funcs[index].classList.add('activeFunction');

            for (let i = 0; i < buts.length; i++) {
                if(i != index) {
                    buts[i].classList.remove('active');
                    funcs[i].classList.remove('activeFunction');
                }
            }
        }
    }
}

var buttons = ['accountButton','friendListButton','addFriendButton'];
var functions = ['account','friendList','addFriend'];

functionsControl(buttons,functions);