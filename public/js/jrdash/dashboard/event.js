var Event=function(){
  
    this.__construct=function(){
    
      Result=new Result();
      load_todo();
      
      update_todo_display();
      edit_todo();
      create_todo();
      update_todo();
      delete_todo();
      
    };
//============================================================================================================    
    
   var load_todo=function(){
     
      $.get('api/get_todo',function(o){
          var output='';
          for(var i=0;i<o.length;i++){
              output +=Template.todo(o[i]);
          }
          $("#list_todo").html(output);
      },'json');
  };
//============================================================================================================

var update_todo_display=function(){
    $("body").on("click",'.todo_edit_display',function(e){
       e.preventDefault();
       
       var todo_id=$(this).attr('data_id');
       var output=Template.todo_edit(todo_id);
       
       $("#todo_edit_container_"+todo_id).html(output);
       var task=$("#task_"+todo_id).html();
       var date=$("#date_"+todo_id).html();
       $("#todo_edit_container_"+todo_id).find('#content').val(task);
       $("#todo_edit_container_"+todo_id).find('#date').val(date);
    });
    $("body").on("click","#cancel",function(e){
       e.preventDefault();
       $(this).parents('.todo_edit_container').html('');
    });
};
    
//============================================================================================================   
    
var edit_todo=function(){
   $("body").on('click','#todo_edit_form',function(evt){
       evt.preventDefault();
       
       var url='api/edit_todo';
       console.log(url);
       var postData={
           todo_id:$(this).find('#todo_id').val(),
           task:$(this).find('#content').val(),
           date:$(this).find('#date').val()
       };
       
     $.post(url,postData,function(o){
         if(o.result==1){
             Result.success("Successfully Updated");
             $("#task_"+postData.todo_id).html(postData.task);
             $("#date_"+postData.todo_id).html(postData.date);
             $(this).parents('.todo_edit_container').html('');
         }else{
             Result.error("Error saving");
         }
         
     },'json');
      
   });  
 };   
 
//============================================================================================================
    
    var create_todo=function(){
      $('#create_todo').submit('click',function(evt){
          evt.preventDefault();
          var url=$(this).attr('action');
          console.log(url);
          var postData=$(this).serialize();
         $.post(url,postData,function(o){
             if(o.result===1){
                 var output=Template.todo(o.data[0]);
                 $("#list_todo").append('<tr><td>'+output+'</td></tr>');
                 $("#create_todo input[type=text]").val('');
                 $("#create_todo input[type=date]").val('');
             }else{
                 Result.error(o.error);
             }
         },'json'); 
         
      });  
    };
//============================================================================================================
    
    var update_todo=function(){
        $("body").on("click",".todo_update",function(evt){
           evt.preventDefault();
           var self=$(this);
           var url=$(this).attr('href');
          
           var postData={
               todo_id:$(this).attr('data-id'),
               completed:$(this).attr('data-completed')
           };
          
       $.post(url,postData,function(o){
          if(o.result==1){
              Result.success('Saved');
              if(postData.completed==1){
                  //$("#todo_"+postData.todo_id).addClass('todo_complete');
                  self.parents('tr').addClass('todo_complete');
                  self.html('<i class="btn btn-default glyphicon glyphicon-share-alt"></i>');
                  self.attr('data-completed',0);
              }else{
                  self.parents('tr').removeClass('todo_complete');
                  self.html('<i class="btn btn-default glyphicon glyphicon-ok"></i>');
                  self.attr('data-completed',1); 
              }
              
          } else{
              Result.error('NOthing Updated');
          }
       },'json');
        
        });
    };
//============================================================================================================
    var delete_todo=function(){
        $("body").on('click','.todo_delete',function(evt){
            evt.preventDefault();
            var self=$(this).parents('tr');
            var url=$(this).attr('href');
            var postData={
                todo_id:$(this).attr('data-id')
            };
            $.post(url,postData,function(o){
                if(o.result==1){
                    Result.success('item Deleted');
                   self.remove();
                }else{
                    Result.error(o.msg);
                }
            
            
            },'json');
            
        });
    };
    
    this.__construct();
};