$('body').on('click', '.modal-show', function(event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('.btn-save').css('display', 'block')
        .text(me.hasClass('edit') ? 'Update' : 'Save');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response) {
            $('#modal-body').html(response);
        }
    });

    $('.modal').modal('show');
});


// Save or Edit data
$('.btn-save').click(function(event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PATCH';

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function(response) {
            form.trigger('reset');
            $('.modal').modal('hide');
            $('#datatables').DataTable().ajax.reload();

            swal({
                icon: 'success',
                title: 'Success!',
                text: 'Data has been saved!'
            })
        },
        error: function(xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, value){
                    $('#'+key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<div class="invalid-feedback">'+ value +'</div>')
                });
            }
        }
    });
});


// Delete user
$('body').on('click', '.btn-delete', function(event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: "Are you sure delete "+ title +"?",
        text: "Once deleted, you will not be able to revert this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((deleteIt) => {
        if (deleteIt) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function(response) {
                    $('#datatables').DataTable().ajax.reload();
                    swal({
                        title: 'Success !',
                        icon: 'success',
                        type: 'success',
                        text: 'Data has been deleted!'
                    });
                },
                error: function(xhr) {
                    swal({
                        title: 'Error !',
                        icon: 'error',
                        text: 'Data has been deleted!'
                    })
                }
            })
        }
    });
});


// Details data by id
$('body').on('click', '.btn-detail', function(event) {
    event.preventDefault()

    var me = $(this),
        title = me.attr('title'),
        url = me.attr('href');

    $('#modal-title').text(title)
    $('.btn-save').css('display', 'none')

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(res) {
            $('#modal-body').html(res)
        }
    })

    $('.modal').modal('show')
});

