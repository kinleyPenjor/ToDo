<div class="row">
    <div class="col-lg-9">
        <div id="register_form_error" class="alert alert-error"></div>
        
           <form id="register_form" class="form-horizontal" method="post" action="<?php echo base_url('api/register'); ?>">
            <div class="row">
                <label class="control-label col-lg-3">Login</label>
                <div class="controls col-lg-4" >
                    <input type="text" name="login" class="form-control"/>
                </div>   
            </div>
            <div class="row">
                <label class="control-label col-lg-3">Email</label>
                <div class="controls col-lg-4" >
                    <input type="text" name="email" class="form-control"/>
                </div>   
            </div>
            <div class="row">
                <label class="control-label col-lg-3">Password</label>
                <div class="controls col-lg-4">
                    <input type="password" name="password" class="form-control"/>
                </div>   
            </div>
            <div class="row">
                <label class="control-label col-lg-3">Confirm Password</label>
                <div class="controls col-lg-4">
                    <input type="password" name="confirm_password" class="form-control"/>
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                    
                <div class="controls">
                    <input type="submit" value="register" class="btn btn-primary"/>
                    <a class="btn btn-warning" href="<?php echo base_url('/');?>">Cancel</a>
                </div>
            </div>
    </form>  
        
        
        
    </div>
    
</div>
<script type="text/javascript">
$(function(){
    $('#register_form_error').hide();
   $('#register_form').submit(function(evt){
       evt.preventDefault();
       var url=$(this).attr('action');
       var postData=$(this).serialize();
       $.post(url,postData,function(o){
           if(o.result==1){
               window.location.href='<?php echo base_url('task') ?>';
           }else{
              $("#register_form_error").show();
              var output='<ul>';
              for(var key in o.error){
                  var value=o.error[key];
                  output +='<li>'+value+'</li>';
           }}
           output +='</ul>';
           $("#register_form_error").html(output);
       },'json');
   }); 
});

</script>

