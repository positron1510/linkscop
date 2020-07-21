var RemoveUser = {
    element: null,
    click: function () {
        $(".remove-user").click(function () {
            RemoveUser.element = $(this);
        });

        return this;
    },
    checkRemove: function () {
        $('#remove-user').click(function () {
            var id = RemoveUser.element.attr('data-user');

            $.ajax({
                url: '/removeUser/'+id,
                statusCode: {
                    200: function () {
                        $('#user-list-'+id).remove();
                    }
                }
            });
        });
    }
};

$(document).ready(function () {
    RemoveUser
        .click()
        .checkRemove();

    $('#user').DataTable({
        "language": {
            info: "Показана анализов _START_ из _END_",
            lengthMenu: "Показано _MENU_",
            search: "Поиск:",
            paginate: {
                first: "Первый",
                last: "Последний",
                next: "Следующий",
                previous: "Предыдущий"
            }
        }
    });

    $('.show-user').click(function () {
        var id = $(this).attr('data-user');

        $.get("/user/"+id, function (data) {
            var main = $('#modal-user');

            main.find('.username').html(data.username);
            main.find('.user-role').html(data.roles_users.name);
        });
    });
});