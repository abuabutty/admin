<div class="card">
    <div class="card-header">
      <div class="row">

        <div class="col-md-4">
          <h3></h3>
        </div>

        <div class="col-md-6" align="center">
          <?php   if($this->session->flashdata('save_course'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-success message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('save_course'); ?></strong>
                      </div>
          <?php   } ?>
              <?php   if($this->session->flashdata('update_course'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-success message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('update_course'); ?></strong>
                        </span>
                    </div>
          <?php   } ?>
          <?php   if($this->session->flashdata('delete_coadmin'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-danger message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('delete_coadmin'); ?></strong>
                        </span>
                      </div>
          <?php   } ?>
        </div>

        <div class="col-md-2" align="right">  
          <a href="coadmin_register_form">
              <input type="submit" name="add" id="add" value="Add" class="btn btn-primary">
          </a>
        </div>

      </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="module_table">
          <thead>
            <tr>
              <th scope="col">SI No</th>
              <th scope="col">Module Name</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>

</div>


<script type="text/javascript">
  $(document).ready(function()
  {
    $('.hideit').fadeOut(10000);

        var dataTable = $('#module_table').DataTable({  
             "processing":true,  
             "serverSide":true,  
             "order":[],  
             "ajax":{  
                  url:"<?php echo base_url('admin/fetch_modules'); ?>",  
                  type:"POST"  
             },  
        });
    
      $('#add').click(function()
      { 
        $('#mymodal').modal('show');
        $('#mymodal').find('.modal-title').text('Add College');
      });

      $("#myform").validate(
      {
       rules:{
        collegename: {
          required:true
        },
        collegecode:{
          required:true
        }

       },
       messages:{
        collegename:{
          required: "Please enter your college"
        },
        collegecode:{
          required: "Please enter College Code"
        }
       }
      });

      $('#mymodal').on('hidden.bs.modal',function(){
        $('#collegename-error').hide();
        $('#collegename').attr('value','');
      });

  });
</script>