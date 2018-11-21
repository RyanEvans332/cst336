//May the Lord be with whomever dares gaze upon the sin I have brought upon this world.
    window.onload = generateForm();
    var vars={};
    
    function createCookie(name, value,days){//helper function since jquery and js don't support cookies as beautifully as php
        if(days){
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        document.cookie = name+"="+value+expires+"; path=/";
    }
    
    function getCookie(name) {//these helper functions could be relegated to an API to lower the code's complexity
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else
        {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
            end = dc.length;
            }
        }
        return decodeURI(dc.substring(begin + prefix.length, end));
    }

    function deleteCookie(name){//setting any cookie to a negative TTL auto-deletes it
        createCookie(name, "", -1);
    }

    
    function generateForm(){//we dont set the cookies using post data so we can do this a little more dynamically this time
        var amount = 7;
        $("#form").append("<tr><td></td><td>Task</td><td></td></tr>")
        for (var i=1; i < amount; i++){

        eval("var textCookie = getCookie('textbox" + i + "')");
        eval("var checkCookie = getCookie('checkbox" + i + "')");
        if(textCookie == null){
            var name = '';
            var checked = '';
        } else{
            eval("var name = getCookie('textbox" + i + "')");
            eval("var checkCookie = getCookie('checkbox" + i + "')");//deprecated checkbox cookie because I couldn't get it to work on time. Left old code in because the rest of the program breaks without it for some reasom
        }//I'm horribly, horribly, sorry for this long expression. Appending tables dynamically several appends at a time doesn't really work too well. If I do it all at once, the table renders properly. Ugly, but it works.
        $("#form").append("<tr><td>Task#" + i + ":</td><td><input type='text' id ='textbox" + i + "' value ='" + name + "' size = '35'></td><td><input type='hidden' id ='checkbox" + i +"' "+ checkCookie + "></td><td><button class='btn btn-danger ' name = 'removetask' onClick='removeCookieDynamically("+i+")'>Remove</button></td></tr>");
    }
    $("#form").append("</table>");
    $("#form").append("<button class ='btn btn-success' onClick ='submitCookies()'>Submit</button>");
}


function removeCookieDynamically(index){//this function both deletes the cookie and clears the field dynamically. In the old version, this was a glorified form, so the webpage had to reload. Not this time.
    eval("deleteCookie('textbox"+index+"')");
    eval("document.getElementById('textbox"+index+"').value = ''");
}

function submitCookies(){//since this program is so small, we can just update the entire form procedurally, rather than on a per-case basis. On production level software, we'd have to do this a little smarter since it takes up so much CPU time
           var amount = 7;
    for(var o = 1; o < amount ; o++){
        if(eval("document.getElementById('checkbox" +o+"').checked")){
            eval("createCookie('checkbox"+o+"', 'checked', 2)");
        }
        else{
            eval("createCookie('checkbox"+o+"', '', 2)");
        }
        eval("createCookie('textbox"+o+"', document.getElementById('textbox"+o+"').value, 2)");
        //createCookie(eval('"textbox" + o'), document.getElementById(eval('"textbox" + o')).value, 2);
    }
}