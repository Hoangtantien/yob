
$(document).ready(function () {
    $(".has-child > .menu-link").click(function (e) {
        e.preventDefault();
        $(this).next(".sub-menu").slideToggle();
    });

    $("#upload").on("change", function () {
        const form = new FormData();
        form.append("file", $(this)[0].files[0]);
        var url = $(this).data("url");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            processData: false,
            contentType: false,
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: form,
            url: url,
            success: function (response) {
                if (response.error == false) {
                    $("#preview").html(
                        '<a href=" "><img src= " ' + response.url + ' " ></a>'
                    );
                    $("#file").val(response.url);
                } else {
                    alert("Tải file thất bại");
                }
            },
        });
    });

    $(".show-modal-event").on("click", function () {
        var url = $(this).data("url");
        var type = $(this).data("type");

        $.ajax({
            type: "get",
            url: url,
            data: {
                type: type
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#modal-show").html(response);
            },
            error:function(jqXHR, exception){
                console.log(jqXHR, exception);
            }
        });
    });
    $(".showUserAchievement").on("click",function(){
        var url = $(this).data("url");
        $.ajax({
            type: "get",
            url: url,
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#modal-show").html(response);
            },
            error:function(jqXHR, exception){
                console.log(jqXHR, exception);
            }
        });
    })
});
