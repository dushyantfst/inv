/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var appName = "demo";
var url = '/backoffice/web/index.php?r=site/list-tasks';
var access_token = 'Zs0nTQB-ujOSV0KmEoPhBx2E6-Ab_GKO'; //'######access_token###########'
var content_type = 'application/json';
var html5task = {};
html5task.tasks = function () {
    var SendInfo = {};
    $.ajax({
        url: url ,
        type: 'post',
//                        data: {},
        data: JSON.stringify(SendInfo),
        dataType: 'json',
        success: function (data) {
            var count = 0;
            console.info(JSON.stringify(data));
            //$("#test_div").html(JSON.stringify(data));
//            $("#test_div").show();
//            alert(data.result);
//            var obj = JSON.parse(JSON.stringify(data));
//            
//            var result = $.parseJSON(JSON.stringify(obj.result));
            console.info(JSON.stringify(data.result));
            var identifier, todo, type, project, start, finish;
            $.each(data.result, function (k, jsonObject) {
                identifier = jsonObject.task_id;
                todo = jsonObject.task_name;
                type = jsonObject.task_status;
                project = jsonObject.project_id;
                finish = jsonObject.task_finish_date;
                start = jsonObject.task_start_date;
//                count++;
                if (type == "Not Started") {
                    $('#newList').append('<a href="#finish" class="" id="item"><li id="' + identifier + '" class="list-group-item mt-5"> Project : ' + project + " <br>Target Date -> " + finish + " <br> Task : " + todo + '<span class="arrow pull-right"><i class="glyphicon glyphicon-arrow-right"></span></li></a>');
                } else if (type == "In Progress") {
                    $('#currentList').append('<a href="#finish" class="" id="inProgress"><li id="' + identifier + '" class="list-group-item"> Project : ' + project + " <br>Target Date -> " + finish + " <br> Task : " + todo + '<span class="arrow pull-right"><i class="glyphicon glyphicon-arrow-right"></span></li></a>');
                } else {
                    $('#archivedList').append('<a href="#finish" class="" id="archived"><li id="' + identifier + '" class="list-group-item"> Project : ' + project + " <br>Target Date -> " + finish + " <br> Task : "  + todo + '<span class="arrow pull-right"><i class="glyphicon glyphicon-remove"></i></span></li></a>');
                }

            });

            console.info(JSON.stringify(identifier));

        }

    });
};
html5task.loadTodo = function (text) {
    html5task.todos(text);
}

html5task.add = function (nindex, todo) {


////alert(JSON.stringify(SendInfo)); 
    var SendInfo = {"Data": [{"identifier": nindex, "type": "started", "todo": todo}]};
    $.ajax({
        url: url + 'save',
        type: 'post',
        data: JSON.stringify(SendInfo),
        headers: {
            "access_token": access_token,
            "Content-Type": content_type,
            "origin": 'app'
        },
        dataType: 'json',
        success: function (data) {
//            $("#test_div").show();
            var result = $.parseJSON(JSON.stringify(data));
            console.info(JSON.stringify(result));
//            $("#test_div").html(JSON.stringify(result.description));
            html5task.showMessage('#9BED87', 'black', 'Task Item added successfully.');
        },
        error: function (xhr, thrownError) {
            console.info("readyState: " + xhr.readyState + "\nstatus: " + xhr.status + "\nresponseText: " + xhr.responseText);
//            alert(thrownError);
        }
    });
};
html5task.advance = function (identifier, done) {

    ////alert(JSON.stringify(SendInfo)); 
//    var SendInfo = {"Data": [{"type": "completed", "todo": todo}]};
    var SendInfo = {"Data": {"type": done}, "filter": {"identifier": identifier}, "type": "single"};
    $.ajax({
        url: url + 'update',
        type: 'post',
        data: JSON.stringify(SendInfo),
        headers: {
            "access_token": access_token,
            "Content-Type": content_type,
            "origin": 'app'
        },
        dataType: 'json',
        success: function (data) {
//            $("#test_div").show();
            var result = $.parseJSON(JSON.stringify(data));
            console.info(JSON.stringify(result));
//            $("#test_div").html(JSON.stringify(result.description));
            html5task.showMessage('#9BED87', 'black', 'Task Item updated successfully.');
        },
        error: function (xhr, thrownError) {
            console.info("readyState: " + xhr.readyState + "\nstatus: " + xhr.status + "\nresponseText: " + xhr.responseText);
//            alert(thrownError);
        }
    });
};

html5task.remove = function (identifier) {

    ////alert(JSON.stringify(SendInfo)); 
//    var SendInfo = {"Data": [{"type": "completed", "todo": todo}]};
    var SendInfo = {"filter": {"identifier": identifier}, "type": "one"};
    $.ajax({
        url: url + 'delete',
        type: 'post',
        data: JSON.stringify(SendInfo),
        headers: {
            "access_token": access_token,
            "Content-Type": content_type,
            "origin": 'app'
        },
        dataType: 'json',
        success: function (data) {
//            $("#test_div").show();
            var result = $.parseJSON(JSON.stringify(data));
            console.info(JSON.stringify(result));
//            $("#test_div").html(JSON.stringify(result.description));
            html5task.showMessage('#9BED87', 'black', 'Task Item deleted successfully.');
//            var markup = '<li id="' + identifier + 'done">' + done + '<button class="btn btn-default btn-xs pull-right  remove-item"><span class="glyphicon glyphicon-remove"></span></button></li>';
//            $('#done-items').append(markup);
//            $('.remove').remove();

//                    done(doneItem);
//            countTodos();
        },
        error: function (xhr, thrownError) {
            console.info("readyState: " + xhr.readyState + "\nstatus: " + xhr.status + "\nresponseText: " + xhr.responseText);
            html5task.showMessage('#9BED87', 'black', 'Error while deleting the Item.');
//            alert(thrownError);
        }
    });
};
html5task.showMessage = function (bgcolor, color, msg) {
    if (!$('#smsg').is(':visible'))
    {
        $('html, body').animate({
            scrollTop: 0
        }, 500, function () {
            if (!$('#smsg').length)
            {
                $('<div id="smsg">' + msg + '</div>').appendTo($('body')).css({
                    position: 'absolute',
                    top: 0,
                    left: 3,
                    width: '98%',
                    height: '50px',
                    lineHeight: '30px',
                    background: bgcolor,
                    color: color,
                    zIndex: 1000,
                    padding: '10px',
                    fontWeight: 'bold',
                    textAlign: 'center',
                    opacity: 0.9,
                    margin: 'auto',
                    display: 'none'
                }).slideDown('show');
                setTimeout(function () {
                    $('#smsg').animate({'width': 'hide'}, function () {
                        $('#smsg').remove();
                    });
                }, 4000);
                $(".btn-primary").addClass('disabled');
                $(".btn-warning").removeClass('disabled');
            }
        });
    }
};
