const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
})
/*
$(document).ready(function () {
    $(".sendLikeForm").submit(function (event) {
        event.preventDefault();
        let formAction = $(this).attr('action');
        let token = $(this).find("input[name = _token]").attr('value');
        let likesNumber = $(this).find("button > span");
        let divWrapper = $(this).find(" > div");
        $.ajax({
            url: formAction,
            method: "POST",
            data: {'_token': token},
            success: function (response) {
                if (response.status)
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                if (response.increment) {
                    likesNumber.html(Number(likesNumber.html()) + 1);
                    divWrapper.toggleClass([
                        'text-blue-500',
                        'text-gray-500'
                    ]);
                } else {
                    likesNumber.html(Number(likesNumber.html()) - 1);
                }

            },
            error: function (response) {
                if (!response.status)
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
            }
        })
    });
});
*/
