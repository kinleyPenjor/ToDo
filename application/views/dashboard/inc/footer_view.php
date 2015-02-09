</div>

<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Task Edit</h2>
            </div>
            
            <div class="modal-body">
                
                
                <form class="form-horizontal" role="form" id="edit_todo" action="<?php echo base_url('api/edit_todo'); ?>" method="post">
                    <?php
                    $q=$this->db->get('todo');
                    
                      $value=json_encode($q->result());
                      $show=  json_decode($value,TRUE);
                     print_r($result);
                    
                   
                    ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="task">Task</label>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" name="task" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="date">Date</label>
                        </div>
                        <div class="col-lg-5">
                            <input type="date" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3">
                            <input class="btn btn-primary" type="submit" value="update"/>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>




<footer class="nav navbar-fixed-bottom">
    &copy;<?php echo date('Y')?>
</footer>
<script type="text/javascript">
            var dashboard=new Dashboard();
        </script>
</body>
</html>