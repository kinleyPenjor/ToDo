var Template=function(){
  
    this.__construct=function(){
      //console.log('Template created');  
    };
    
//============================================================================================================
    
    this.todo=function(obj)
    {
      var output='';
      if(obj.completed===1){
       output +='<div id="todo_'+obj.todo_id+' class="todo_complete">';   
      }else{
          output +='<div id="todo_'+obj.todo_id+'">';
      }
      output+='<tr id="show"><td>'+obj.todo_id+'</td>';
      output +='<td id="task_'+obj.todo_id+'">'+obj.content+'</td>';
      output +='<td id="date_'+obj.todo_id+'">'+obj.date_added+'</td>';
      
      if(obj.completed==1){
         output +='<td><a class="todo_update" data-id="'+obj.todo_id+'" data-completed="0" href="api/update_todo"><i class="btn btn-default glyphicon glyphicon-share-alt"></i></a></td>'; 
      }
      else if(obj.completed==0) {
          output +='<td><a class="todo_update" data-id="'+obj.todo_id+'" data-completed="1"  href="api/update_todo/'+obj.todo_id+'"><i class="btn btn-default glyphicon glyphicon-ok"></i></a></td>';
      }
      
      output +='<td><a class="todo_edit_display" data_id="'+obj.todo_id+'" href="#"><i class="btn btn-default glyphicon glyphicon-pencil"></i></a></td>';
     
      output +='<td><a data-id="'+obj.todo_id+'" class="todo_delete" href="api/delete_todo/'+obj.todo_id+'"><i class="btn btn-default glyphicon glyphicon-trash"></i></a></td></tr>';
      
      output +='</div>';
       output+='<div class="todo_edit_container" id="todo_edit_container_'+obj.todo_id+'"></div>';
      return output;
    };

//============================================================================================================
    this.todo_edit=function(todo_id)
    {
        var output='';
        output +='<form class="form-horizontal" id="todo_edit_form" method="post" action="">';
        output +='<input type="text" id="content" name="content" class="form-control col-lg-4" />';
        output +='<input type="hidden" id="todo_id" value="'+todo_id+'" />';
        output +='<input type="date" id="date" name="date" class="form-control col-lg-4"/>';
        output +='<input type="submit" id="save" value="save" class="btn btn-primary "/>';
        output +='<input type="submit" id="cancel" value="Cancel" class="btn btn-default"/>';
        output +='</form>';
       return output;
    };
    
    this.__construct();
};