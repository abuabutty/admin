<div class="container">
   
      <h2>User Details</h2>  
  <br>

  <div class="">

<div style="text-align:center">
  
<?php if($this->session->flashdata('saved')!='')
{
  echo "<span class='alert alert-success message'><strong>".$this->session->flashdata('saved')."</strong></span>";
}
?>

<?php if($this->session->flashdata('update')!='')
{
  echo "<span class='alert alert-info message'><strong>".$this->session->flashdata('update')."</strong></span>";
}
?>

<?php if($this->session->flashdata('delete')!='')
{
  echo "<span class='alert alert-danger message' align='center'><strong>".$this->session->flashdata('delete')."</strong></span>";
}
?>
</div>

  </div><br>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SiNo</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">A1</th>
      <th scope="col">A2</th>
    </tr>
  </thead>

  
  <tbody>
    <?php $i=1; ?>
    <?php foreach ($data as $row) { ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td style="display: none;"><?php echo $row->id; ?></td>
      <td><?php echo ucfirst($row->firstname); ?></td>
      <td><?php echo ucfirst($row->lastname); ?></td>
      <td><?php echo $row->email; ?></td>
      <td><button type="submit" class="btn btn-info editdetails" id="edit" name="edit">Update</button></td>
      <td><button type="button" class="btn btn-danger deletedetails" id="delete" name="delete">Delete</button></td>
    </tr>
    <?php $i=$i+1; } ?>
  </tbody>
</table>

</div>



<!-- Button trigger modal -->


<!-- Modal -->


<div class="modal fade" id="mymodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="myform">
      <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
          </div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary" id="save">Save</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- ************************************************************************************************************ -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="deleteuser" method="POST" id="deleteform">

      <div class="modal-body">
        <input type="hidden" name="did" id="did">
        <h4>Are you sure you wnat to Delete this</h4>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="delete" class="btn btn-primary">Yes</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- ************************************************************************************************************ -->


<script type="text/javascript">
  
  $(document).ready(function()
  {

    $(".message").fadeOut(5000);

    $('.editdetails').click(function()
    {
      $("#mymodal1").modal('show');
      $("#mymodal1").find('.modal-title').text('Update Form');
      $("#save").html("Update");
      $("#myform").attr('action','updateuser');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function()
      {
        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[1]);
      $('#fname').val(data[2]);
      $('#lname').val(data[3]);
      $('#email').val(data[4]);


    });


    $('.deletedetails').click(function()
    {
      $("#deletemodal").modal('show');
      $("#deletemodal").find('.modal-title').text('Comfirm?');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function()
      {
        return $(this).text();
      }).get();

      console.log(data);

      $('#did').val(data[1]);


    });


    $('#add').click(function()
    {
      $("#mymodal1").modal('show');
      $("#myform").attr('action','saveuser')
      $("#mymodal1").find('.modal-title').text('Registration From');
      $("#save").html("Save");

    });


    $('#mymodal1').on('hidden.bs.modal', function (e) {
        $(this).find('form')[0].reset();
        $("#fname-error").hide();
        $("#lname-error").hide();
        $("#mobile-error").hide();
        $('#mobileav').html('');
    })


    $("#myform").validate({
      rules:
      {
        fname:
        {
          required:true
        },
        lname:
        {
          required:true
        },
        mobile:
        {
          required:true,
          mobileNL:true
        }
      },
      messages:
      {
        fname:
        {
          required: 'Please enter your First name'
        },
        lname:
        {
          required: 'Please enter your Last name'
        },
        mobile:
        {
          required: 'Please enter your Mobile'
        }
      }
    });

    $.validator.addMethod( "mobileNL", function( value, element ) {
      return this.optional( element ) || value.length <=10 && /^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/.test( value );
      }, "Please specify a valid mobile number" );


  });

</script>




