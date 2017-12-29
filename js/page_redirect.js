$(document).ready(function(){
    redirect_user();
    redirect_group();
});


function redirect_user(){
    console.log('User redirect function added.');

    $('.user_redirect').each(function(){
        console.log('Redirect add to each redirect link.');
        var link = this;
        $(link).click(function(){
           console.log('Page view: ' + link.id);
           page_redirect(link.id);
        });
    });
}

function page_redirect(link_id){
    console.log('Page redirect link id: '+link_id);
    $.post('ajax/redirect.php', {
        task: 'user_page_redirect',
        id: link_id
    }).success(function(data){
       console.log(data)
    });
}

function redirect_group(){
    console.log('group redirect function added.');

    $('.group_redirect').each(function(){
        console.log('Redirect add to each redirect group link.');
        var link = this;
        $(link).click(function(){
            console.log('Group page view: ' + link.id);
            group_page_redirect(link.id);
        });
    });
}

function group_page_redirect(link_id){
    console.log('Page redirect link id: '+link_id);
    $.post('ajax/redirect.php', {
        task: 'group_page_redirect',
        id: link_id
    }).success(function(data){
        console.log(data)
    });
}
