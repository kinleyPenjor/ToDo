<div class="row">
    <div class="pull-right" >
        <form id="login_form" class="form-horizontal" method="post" action="<?php echo base_url('api/login'); ?>">
            
            <div class="row">
                    <label class="control-label col-lg-3">Login</label>
                    <div class="controls col-lg-7" >
                        <input type="text" name="login" placeholder="login" class="form-control"/>
                    </div>   
                </div>
            
            
                <div class="row">
                    <label class="control-label col-lg-3">Password</label>
                    <div class="controls col-lg-7">
                        <input type="password" name="password"  class="form-control"/>
                    </div>   
                </div>
           
            
           
                <div class="row">
                    
                    <div class="controls ">
                        <div class="col-lg-4"></div>
                        <input type="submit" value="login" class="btn btn-success"/>
                        <a class="btn btn-primary" href="<?php echo base_url('home/register');?>">Register</a>
                    </div>
                </div>
           
            
    </form> 
        <div class="carousel ">
            <h1>Welcome!!</h1>
            <P>This is a simple ToDo created as a</P>
            <ul>
                <li>PHP,</li>
                <li>Bootstrap/Twitter Bootstrap and,</li>
                <li>Jquery & Javascript</li>
            </ul>
        </div>
        
    </div>
    
    <div >
        
        
        <div class="jumbotron col-lg-8" id="jumbotron">
            <h1>Welcome!!</h1>
            <P>This is a simple ToDo created as a part of learning.It includes the following:</P>
            <ul>
                <li>PHP,</li>
                <li>Bootstrap/Twitter Bootstrap and,</li>
                <li>Jquery & Javascript</li>
            </ul>
        </div>
    </div>
    
</div>
<script type="text/javascript">
$(function(){
   $('#login_form').submit(function(evt){
       evt.preventDefault();
       var url=$(this).attr('action');
       console.log(url);
       var postData=$(this).serialize();
       $.post(url,postData,function(o){
           if(o.result==1){
               window.location.href='<?php echo base_url('task') ?>';
           }else{
               alert('invalid login');
           }
       },'json');
   }); 
});

</script>
