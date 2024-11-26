$(function() {

    $('.btn-add').on('click', function() {
        // $('#modalTitle').html('add task');
        // $('.modal-footer button[type=submit]').html('add data');
    })

    $('.modalStatus').on('click', function() {

        const idStatus = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc-php/public/task/getUpdate',
            data: {id: idStatus},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#status').val(data.status);
                $('#id_status').val(data.id_task);
                
            }
        })
    });

    $('.modalEdit').on('click', function() {
        
        $('#modalTitle').html('edit task');
        $('.modal-footer button[type=submit]').html('edit data');
        $('.modal-body form').attr('action','http://localhost/mvc-php/public/task/update');

        const id = $(this).data('id');
       

        $.ajax({
            url: 'http://localhost/mvc-php/public/task/getUpdate',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                 $('#name_task').val(data.name_task);
                 $('#category').val(data.category);
                 $('#id_task').val(data.id_task);
                 $('$notes').val(data.notes);
            }
        })
    });

});