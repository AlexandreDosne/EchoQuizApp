
var hooks = document.getElementsByTagName('hook');
var last_hook_id = 0;

// add member button
document.getElementById('plus-boutton').addEventListener('click', () =>
{
    if (last_hook_id < 7)
    {
        hooks[++last_hook_id].innerHTML = hooks[last_hook_id - 1].innerHTML;

        let member_n = document.querySelector('#hook' + (last_hook_id + 1) + ' .hook_member_n');
        member_n.innerText = (last_hook_id + 1).toString();

        let input_fields = document.querySelectorAll('#hook' + (last_hook_id + 1) + ' .prenom-nom input');
        input_fields[0].id = input_fields[0].id.substring(0, input_fields[0].id.length - 1) + (last_hook_id + 1);
        input_fields[0].name = input_fields[0].name.substring(0, input_fields[0].name.length - 1) + (last_hook_id + 1);

        input_fields[1].id = input_fields[1].id.substring(0, input_fields[1].id.length - 1) + (last_hook_id + 1);
        input_fields[1].name = input_fields[1].name.substring(0, input_fields[1].name.length - 1) + (last_hook_id + 1);
    }
});

// remove member button
document.getElementById('minus-boutton').addEventListener('click', () =>
{
    if (last_hook_id > 0)
    {
        hooks[last_hook_id--].innerHTML = '';
    }
})