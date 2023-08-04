

if(typeof app.cupnoodles_sitemessages !== 'undefined'){

    app.cupnoodles_sitemessages.forEach(function (msg, ix){
        console.log(msg);
        if(msg.msg_type == 'Footer'){

            const footer = document.createElement('div');
            footer.id = 'cupnoodles-sitemessages-' + msg.msg_id;
            footer.classList.add('cupnoodles-sitemessages-footer');
            footer.setAttribute('data-control', 'cupnoodles-sitemessages-footer');
            footer.setAttribute('data-msg-id', msg.msg_id);
            footer.setAttribute('data-repeat-mode', msg.msg_repeat);
            footer.innerHTML = msg.msg_html;

            document.body.appendChild(footer);
            

            
        }
        else if(msg.msg_type == 'header'){

        }
        else if(msg.msg_type == 'modal'){

        }
        
    });
    
}


$(function () {

    // footer controls

    var $els = $('[data-control="cupnoodles-sitemessages-footer"]');

    $els.each( function(ix, el){
        var $el = $(this);
        var $btn = $(this).find('.sitemessages-footer-close'),
        cookieName = 'sitemessages-footer-' + $(this).data('msg-id'),
        cookieValue = 'on',
        cookieDuration = 30

        console.log($(this).data('repeat-mode'));
        if($(this).data('repeat-mode') == 'always' || checkCookie(cookieName) == null){
            $el.fadeIn();
        }
        
            

        $btn.on('click', function (event) {
            createCookie(cookieName, cookieValue, cookieDuration);
            $el.fadeOut()
        })

    });







    // modal controls


    // cookie settings

    function createCookie(name, value, days) {
        var expires = ''

        if (days) {
            var date = new Date()
            date.setTime(date.getTime()+(days * 24 * 60 * 60 * 1000))
            expires = '; expires='+date.toGMTString()
        }

        document.cookie = name+"="+value+expires+"; path=/"
    }

    function checkCookie(name) {
        var nameEQ = name+"=",
            ca = document.cookie.split(';')

        for (var i = 0; i < ca.length; i++) {
            var c = ca[i]
            while (c.charAt(0) === ' ') c = c.substring(1, c.length)
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length)
        }

        return null
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }
})

