
<div id="dashboard-view" class="row col-lg-8">
    <div >
        <table class="table-bordered table-striped col-lg-12">
            <thead>
            <th>ID</th>
            <th>Task</th>
            <th>Date</th>
            <th colspan="3">Action</th>
            </thead>
            <tbody id="list_todo">
                
            </tbody>
        </table> 
        </div>
    
    
</div>
<div class="col-lg-3 pull-right">
    <div class="list-group">
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">This</h4>
            <p4>A quick brown fox jumped over the lazy dog!</p4>
        </a>
    </div>
</div>
<div class="row col-lg-10 pull-left">
    <div id="dashboard-side">
        <table class="add_todo">
            <tr>
                <td>
                    <form id="create_todo" action="<?php echo base_url('api/create_todo'); ?>" method="post" class="form-horizontal">
            <div >
                <input type="text" name="content" placeholder="insert tasks" class="form-control"/>
            </div>
                    </td><td>      <div>
                        
                    <input type="date" name="date_added" class="form-control" />
                        </div></td>
            
                        <td><div>
                <input type="submit" class="btn btn-primary" value="ADD"/>
                            </div></td>
            
        </form>
                </td>
            </tr>
        </table>
        
        
    </div>
    
    
    
    
</div>