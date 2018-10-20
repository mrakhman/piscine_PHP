function add_elem()
{
	var input = prompt("Add a new task:", "");
	if (input != null && input != "")
	{
		var c_todo = get_c_todo();
		$("#ft_list").prepend(
			$('<li>', {
				text: input,
				id: c_todo.length,
				click: del_elem
		}));
		c_todo.push(input);
		set_c_todo(c_todo);
	}
	else if (input == null)
		return ;
	else
		add_elem();
}

function del_elem()
{
	if (window.confirm("Do you want to delete element?"))
	{
		id = $( this ).attr('id');;
 		$( this ).remove();
 		var c_todo = get_c_todo();
		c_todo.splice(id, 1);
		set_c_todo(c_todo);
	}
 	else
 		return ;
}

function setCookie(c_name, c_value, ex_days)
{
	var time = new Date();
	time.setTime(time.getTime() + (ex_days * 24 * 60 * 60 * 1000));
	var expires = "expires = " + time.toUTCString();
	document.cookie = c_name + "=" + c_value + ";" + expires + ";path=/";
}

function getCookie(c_name)
{
	var name = c_name + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function get_c_todo()
{
	var value = getCookie("c_todo");
	if (!value)
		return [];
	return (value.split('|'));
}

function set_c_todo(c_todo)
{
	setCookie("c_todo", c_todo.join('|'), 1);
}

$(document).ready(function()
{
	var c_todos = get_c_todo();
	for (var i = 0; i < c_todos.length; i++)
	{
		if (!c_todos[i])
			continue;
		$("#ft_list").prepend(
			$('<li>', {
				text: c_todos[i],
				id: i,
				click: del_elem
		}));
	}
});
