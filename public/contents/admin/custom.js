$(function () {
    $(".delete_btn").on("click", function () {
        $("#modal_delete_form").attr("action", $(this).data("url"));
        $("#modal_delete_form input[name=id]").val($(this).data("id"));
    });

    $(".destroy_btn").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: "delete",
            success: (res) => {
                $(this).parents("tr").remove();
                Toast.fire({
                    icon: "success",
                    title: "data deleted",
                });
            },
        });
    });
    $("input").on("focus", function (e) {
        $(this).siblings("span").html("");
    });
    $("select").on("focus", function (e) {
        $(this).siblings("span").html("");
    });
    $("textarea").on("focus", function (e) {
        $(this).siblings("span").html("");
    });
    $(".insert_form").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: (res) => {
                console.log(res);
                $(this).trigger("reset");
                $('textarea').val('');
                Toast.fire({
                    icon: "success",
                    title: "data create successfully",
                });
            },
            error: (err) => {
                let errors = err.responseJSON.errors;
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        $(`.${key}`).text(element);
                        console.log(key, element);
                    }
                }
            },
        });
    });

    $(".update_insert").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: (res) => {
                console.log(res);
               // $(this).trigger("reset");
               Toast.fire({
                icon: "success",
                title: "data updated successfully",
            });
            },
            error: (err) => {
                let errors = err.responseJSON.errors;
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        $(`.${key}`).text(element);
                        console.log(key, element);
                    }
                }
            },
        });
    });
});
