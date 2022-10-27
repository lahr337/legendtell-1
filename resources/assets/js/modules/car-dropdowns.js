import AjaxCall from  './../classes/AjaxCall'

document.addEventListener('DOMContentLoaded', () => {
    $('select[name="year"]').empty().append($('<option value=""></option>').append('Year'));
    AjaxCall.json("/get/years", "post",{}, function(response){
        let data = eval(response);
        let max_year = data?.Years?.max_year;
        let min_year = data?.Years?.min_year;
        // debugger
        for(let i = max_year; i >= min_year;i--){
            $('select[name="year"]').append(
                $('<option></option>').append(i).val(i)
            )
        }
    });

    // When select year
    $('select[name="year"]').on('change', function(event){
        $('select[name="make"]').empty().append($('<option value=""></option>').append('Make'));
        $('select[name="model"]').empty().append($('<option value=""></option>').append('Model'));
        AjaxCall.json("/get/makes", "post",{year: $(this).val()}, function(response){
            let data = eval(response);
            let makes = data?.Makes;
            if(makes.length > 0) {
                for(let index in makes){
                    $('select[name="make"]').append(
                        $('<option></option>').append(makes[index].make_display).val(makes[index].make_id)
                    )
                }
            }
        });
    })

    // When select year
    $('select[name="make"]').on('change', function(event){
        $('select[name="model"]').empty().append($('<option value=""></option>').append('Model'));
        AjaxCall.json("/get/models", "post",{year: $('select[name="year"]').val(), make: $(this).val()}, function(response){
            let data = eval(response);
            let models = data?.Models;
            if(models.length > 0) {
                for(let index in models){
                    $('select[name="model"]').append(
                        $('<option></option>').append(models[index].model_name).val(models[index].model_name)
                    )
                }
            }
        });
    })
})