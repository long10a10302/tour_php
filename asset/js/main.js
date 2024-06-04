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
        $(document).on('click', '#all', function() {
            $('#in').removeClass('active_button');
            $('#out').removeClass('active_button');
            $(this).addClass('active_button')
        })
        $(document).on('click', '#in', function() {
            $('#all').removeClass('active_button');
            $('#out').removeClass('active_button');
            $(this).addClass('active_button')
        })
        $(document).on('click', '#out', function() {
            $('#all').removeClass('active_button');
            $('#in').removeClass('active_button');
            $(this).addClass('active_button')
        })

    })
    /** -------------------------------------------------------------------------------*/

filterSelection("all")

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

// Show filtered elements
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}
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