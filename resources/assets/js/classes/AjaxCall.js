export default class AjaxCall {
    static json = (url, method, data = {}, successCallback = () => {}, errorCallback = () => {}, async = true) => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url:url,
            method: method,
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            async: async,
            success: successCallback,
            error: errorCallback,
        })
    }
    static formData = (url, method, data = null, successCallback = () => {}, errorCallback = () => {}, async = true) => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url:url,
            method: method,
            data: data,
            async: async,
            success: successCallback,
            error: errorCallback,
        })
    }
    static formMultiData = (url, method, data = '', successCallback = () => {}, errorCallback = () => {}, async = true) => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url:url,
            method: method,
            processData: false,
            contentType: false,
            async: async,
            data: data,
            success: successCallback,
            error: errorCallback,
        })
    }
}