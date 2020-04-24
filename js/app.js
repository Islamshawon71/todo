$(document).ready(function () {
    load();
    $('.clear-completed').hide();

    function load() {
        $.ajax({
            url: 'include/ajax.php',
            contentType: 'application/json',
            data: {
                'action': 'load',
                'status': $('.todo-list').attr('data-status')
            },
            success: function (response) {
                var data = JSON.parse(response);
                // console.log(data);
                let html = '';
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].isDone === '1') {
                            html = html + '<li class="todo completed">' +
                                '<div class="view">' +
                                ' <input data-id="' + data[i].id + '" class="isDone" type="checkbox" checked>' +
                                ' <label data-id="' + data[i].id + '">' + data[i].task + '</label>' +
                                '<input data-id="' + data[i].id + '" type="text" class="edit" value="' + data[i].task + '">' +
                                '<button value="' + data[i].id + '" class="destroy"></button>' +
                                '</div>' +
                                ' </li> ';
                        } else {
                            html = html + '<li class="todo">' +
                                '<div class="view">' +
                                ' <input data-id="' + data[i].id + '" class="isDone" type="checkbox">' +
                                ' <label data-id="' + data[i].id + '">' + data[i].task + '</label>' +
                                '<input data-id="' + data[i].id + '" type="text" class="edit" value="' + data[i].task + '">' +
                                '<button value="' + data[i].id + '" class="destroy"></button>' +
                                '</div>' +
                                ' </li> ';
                        }


                    }
                    $('.todo-count strong').empty().append(data.length);
                    $('.todo-list').empty().append(html);



                } else {
                    $('.todo-count strong').empty().append(data.length);
                    $('.todo-list').empty();
                }

            }
        });
    }

    $(document).on('change', '.todo-list .view input[type="checkbox"]', function () {
        if ($(this).closest('li').hasClass('completed')) {
            $(this).closest('li').removeClass('completed');
        } else {
            $(this).closest('li').addClass('completed');
        }
    });


    $(".new-todo").keydown(function (e) {
        if (e.keyCode === 13) {
            let newTodo = $(this).val();
            if (newTodo == '') {
                $(this).css('border', '1px solid red');
                return;
            }
            $(this).css('border', '0px solid red');
            $.ajax({
                url: 'include/ajax.php',
                contentType: 'application/json',
                data: {
                    'action': 'insert',
                    'newTodo': newTodo
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data['status'] == 'success') {
                        // alert('success');
                        $('.new-todo').val('');
                        load();
                    } else {

                        alert('failed');
                    }
                }
            });
        }
    });

    $(document).on('click', '.destroy', function (e) {
        var id = $(this).val();
        $.ajax({
            url: 'include/ajax.php',
            contentType: 'application/json',
            data: {
                'action': 'delete',
                'id': id
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data['status'] == 'success') {
                    load();
                } else {
                    alert('failed');
                }
            }
        });

    });

    $(document).on('change', '.isDone', function (e) {

        let isDone;
        if ($(this).attr('checked')) {
            isDone = 0;
        } else {
            isDone = 1;
        }
        let id = $(this).data("id");
        $.ajax({
            url: 'include/ajax.php',
            contentType: 'application/json',
            data: {
                'action': 'isDone',
                'isDone': isDone,
                'id': id
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data['status'] == 'success') {
                    // alert('success');
                    $('.new-todo').val('');
                    load();
                } else {
                    alert('failed');
                }
            }
        });

        load();

    });


    $(document).on('click', '.todo-list .view label', function () {
        $(this).closest('li').find('.edit').show();
        $(this).hide();
    });

    $(document).on('keypress', '.edit', function (e) {
        if (e.keyCode === 13) {
            let task = $(this).val();
            let id = $(this).data("id");

            if (task == '') {
                $(this).css('border', '1px solid red');
                return;
            }
            $(this).css('border', '0px solid red');
            $.ajax({
                url: 'include/ajax.php',
                contentType: 'application/json',
                data: {
                    'action': 'update',
                    'task': task,
                    'id': id
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data['status'] == 'success') {
                        $('.new-todo').val('');
                        load();
                    } else {

                        alert('failed');
                    }
                }
            });
        }
    });
    $(document).on('click', '.filters a', function (e) {
        e.preventDefault();
        let status = $(this).html();
        $('.todo-list').attr('data-status', status);
        $('.filters a').removeClass('selected');
        $(this).addClass('selected');

        if (status == 'Completed') {
            $('.clear-completed').show();
        } else {
            $('.clear-completed').hide();
        }
        load();
    });

    $(document).on('click', '.clear-completed', function (e) {
        $.ajax({
            url: 'include/ajax.php',
            contentType: 'application/json',
            data: {
                'action': 'clearComplete'
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data['status'] == 'success') {
                    $('.new-todo').val('');
                    load();
                } else {

                    alert('failed');
                }
            }
        });

    });



});