//modal popup
$(document).ready(function() {
        $(document).on('click', '#login', function() {
            $('.modalLogin').css({
                'display': 'block'
            })
            $(document).on('click', '.modalLogin .modal-content', function(e) {
                e.stopPropagation();
            })
            $(document).on('click', '.modalLogin', function() {
                $(this).hide();
            })
        })
        $(document).on('click', '#signup', function() {
            $('.modalSignup').css({
                'display': 'block'
            })
            $(document).on('click', '.modalSignup .modal-content', function(e) {
                e.stopPropagation();
            })
            $(document).on('click', '.modalSignup', function() {
                $(this).hide();
            })
        })

    })
    /** -------------------------------------------------------------------------------*/

$("#loginForm").validate({
    rules: {
        uname: "required",
        psw: {
            required: true,
            minlength: 5
        }
    },

    messages: {
        uname: "Vui lòng nhập tên đăng nhập",
        psw: {
            required: "Vui lòng nhập mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        },
        psw_repeat: {
            required: "Vui lòng nhập lại mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        },

    },

    submitHandler: function(form) {
        form.submit();
    }
});
$("#registration").validate({
    rules: {
        uname: "required",
        email: {
            required: true,
            email: true
        },
        psw: {
            required: true,
            minlength: 5
        },
        psw_repeat: {
            required: true,
            minlength: 5
        }
    },

    messages: {
        uname: "Vui lòng nhập tên đăng nhập",
        email: "Vui lòng nhập đúng định dạng email",
        psw: {
            required: "Vui lòng nhập mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        },
        psw_repeat: {
            required: "Vui lòng nhập mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        }
    },

    submitHandler: function(form) {
        form.submit();
    }
});
$("#loginForm").validate({
    rules: {
        uname: "required",
        psw: {
            required: true,
            minlength: 5
        }
    },

    messages: {
        uname: "Vui lòng nhập tên đăng nhập",
        psw: {
            required: "Vui lòng nhập mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        },
        psw_repeat: {
            required: "Vui lòng nhập lại mật khẩu",
            minlength: "Mật khẩu của bạn ít nhất phải có 5 ký tự"
        },

    },

    submitHandler: function(form) {
        form.submit();
    }
});
var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, '300');
});