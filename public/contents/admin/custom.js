
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

    $(".component_form_submit").off().on('click',function(e){
        let form = $(this).parents('.component_form'); 
        let target_select = $(this).parents('.component_form').data('target_select');
        let action = $(this).parents('.component_form').attr('action');
        let inputs = $(form[0]).children('.modal-body').children('.form-group').children('div').children('input');
        let textareas = $(form[0]).children('.modal-body').children('.form-group').children('div').children('textarea');
        let selects = $(form[0]).children('.modal-body').children('.form-group').children('div').children('.select_ontime').children('select');
        let temp_form = $(document.createElement('form'));
        $(temp_form).attr('method','POST');
        
        for (const key in inputs) {
            if (Object.hasOwnProperty.call(inputs, key)) {
                const element = inputs[key];
             if(parseInt(key)>=0 && typeof parseInt(key) === 'number'){
                $(temp_form).append($(element).clone());
                }
                
            }
        }
        for (const key in textareas) {
            if (Object.hasOwnProperty.call(textareas, key)) {
                const element = textareas[key];
            if(parseInt(key)>=0 && typeof parseInt(key) === 'number'){
                $(temp_form).append($(element).clone());
            }
                
            }
        }
        for (const key in selects) {
            if (Object.hasOwnProperty.call(selects, key)) {
                const element = selects[key];
            if(parseInt(key)>=0 && typeof parseInt(key) === 'number'){
                $(temp_form).append($(element).clone());
            }
                
            }
        }
        let formData = new FormData(temp_form[0]);
        $.ajax({
            url : action,
            type: "POST",
            data : formData,
            success: (res)=>{
                console.log(res);
                Toast.fire({
                    title: "data create successfully",
                });
                 $('.modal').modal('hide');
                $('.component_form input').val('');
                $('.component_form textarea').val('');
                $('.component_form select').html('');
                $(target_select).prepend(res.html);
                $(target_select).val(res.value);
            },
            error: (err)=>{
                let errors = err.responseJSON.errors;
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        $(`.component_form .${key}`).text(element);
                        console.log(key, element);
                    }
                }
                
            }
        })
       // console.log(form,action,temp_form);
    });

    $('.parent_select').off().on('change',function(){
        let value = $(this).val();
        let control_url = $(this).data('this_field_control_route');
        let control_class = $(this).data('this_field_will_contorl');
        $.get(control_url+'/'+value,(res)=>{
            $('.'+control_class).html(res);
        })
    })

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

$('.load_options').on('click',function(e){
    e.preventDefault();
    let url = $(this).data('url');
    let control_class = $(this).siblings('select').data('this_field_will_contorl');
    $.get(url,(res)=>{
        $(this).siblings('select').html(res);
        $('.'+control_class).html('');
    })
})
