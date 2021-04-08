let base_path = window.location.origin
function setSwalMessage(mode = 'success', title = 'Success', text = 'Data Save Successfully!') {
    Swal.fire({
        icon: mode,
        title: title,
        text: text,
    })
}


$(function () {
    setTimeout(function () {
        $('.message_container').fadeOut();
    },2000);
})

const main_path = window.location.origin
