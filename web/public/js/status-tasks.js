var WebSocketConnect = {
    connect: function () {
        WebSocketConnect.conn = new WebSocket('ws://'+window.location.hostname+':8080/');

        return this;
    },
    status: function () {
        WebSocketConnect.conn.onmessage = function(e) {
            var id = e.data.match(/\d+/i)[0],
                name = e.data.match(/\D+/i)[0],
                element = $('#tasks-list-'+id);

            switch (name) {
                case "wordstat":
                    element.find('.status').text('Сбор Wordstat');
                    break;
                case "topDomain":
                    element.find('.status').text('Сбор ТОПов');
                    break;
                case "parserTop":
                    element.find('.status').text('Сбор ссылок');
                    break;
                case "endAnalysis":
                    element.find('.status').text('Завершена');
                    break;
            }
        };
    }
};

var TaskTable = {
    iDisplayLength: 100,
    processing: true,
    serverSide: true,
    ajax: {
        url: '/taskShow',
        type: "GET"
    },
    columns: [
        {
            data: null,
            name: "name",
            render: function (o) {
                return '<a href="/project/'+o.id+'">'+o.name+'</a>';
            }
        },
        {
            data: "created_at",
            name: "createdAt"
        },
        {
            data: "status",
            name: "status",
            className: "status text-warning",
            render: function (o) {
                switch (o) {
                    case 0:
                        return 'Ожидание';
                    case 1:
                        return 'Сбор Wordstat';
                    case 2:
                        return 'Сбор ТОПов';
                    case 3:
                        return 'Сбор ссылок';
                    case 4:
                        return 'Завершена';
                }
            }
        },
        {
            data: null,
            orderable: false,
            render: function (o) {
                return '<a class="btn btn-primary" href="/restart/'+o.id+'">Перезапустить</a>';
            }
        },
        {
            data: null,
            orderable: false,
            render: function (o) {
                return '<button class="btn btn-danger remove-task" data-task="'+o.id+'" type="button" data-toggle="modal" data-target="#checkRemove">Удалить</button>'
            }
        }
    ],
    createdRow: function(row, data, dataIndex) {
        $(row).attr('id', 'tasks-list-'+data.id);
    },
    order: [
        [1, "desc"]
    ],
    language: {
        info: "Показано анализов _START_ из _END_",
        infoEmpty: "Показано 0 из 0",
        lengthMenu: "Показано _MENU_",
        search: "Поиск:",
        processing: "Загрузка...",
        paginate: {
            first: "Первый",
            last: "Последний",
            next: "Следующий",
            previous: "Предыдущий"
        },
        zeroRecords: "Ничего не найдено"
    }
};

var RemoveProject = {
    element: null,
    table: null,
    click: function () {
        $("#task").on("click", ".remove-task", function () {
            RemoveProject.element = $(this);
        });

        return this;
    },
    checkRemove: function () {
        $('#remove-task').click(function () {
            var id = RemoveProject.element.attr('data-task');

            $.ajax({
                url: '/removeTask/'+id,
                statusCode: {
                    200: function () {
                        RemoveProject.table.rows('#tasks-list-'+id).remove().draw();
                    }
                }
            });
        });
    }
};

$(document).ready(function () {
    RemoveProject.table = $('#task').DataTable(TaskTable);
    RemoveProject
        .click()
        .checkRemove();

    WebSocketConnect
        .connect()
        .status();
});