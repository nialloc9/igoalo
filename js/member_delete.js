$(document).ready(function(){
   $('.member_delete_class_grapper').each(function(){
       var member_id = this.id;
       var btn = '#delete_member'+member_id;
       var group_id = $('#delete_member_group_id').val();

       var memberblock = '#member'+member_id;

       var token = $('#hidden_csrf_token').val();

       $(btn).click(function(){
           $.post('ajax/member_delete.php', {
               task: 'member_delete',
               member_id: member_id,
               group_id: group_id,
               token: token
           }).success(function(data){
               $(memberblock).hide();
           }).error(function(){

           });
       });
   });
});