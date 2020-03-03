<div class="container">
   
      <h2>Details</h2>  
  <br>

  <div class="">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal" id="add">Add</button>

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
<br>
 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ">

  </div>
<!-- <div class="table-responsive">
    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SiNo</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">A1</th>
      <th scope="col">A2</th>
    </tr>
  </thead>

     <?php $i=1; ?>
    <?php foreach ($results as $row) { ?> 
  <tbody>

    <tr>
      <td><?php echo $i; ?></td>
      <td ></td>
      <td><?php echo ucfirst($row->fname); ?></td>
      <td><?php echo ucfirst($row->lname); ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo $row->mobile; ?></td>
      <td><button type="submit" class="btn btn-info editdetails" id="edit" name="edit">Update</button></td>
      <td><button type="button" class="btn btn-danger deletedetails" id="delete" name="delete">Delete</button></td>
    </tr>

  </tbody>
    <?php $i=$i+1; } ?>

  <p><?php echo $links; ?></p> 
</table>
</div> -->



        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable00" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID no</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID no</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($results as $row){ ?>
                  <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->fname; ?></td>
                    <td><?php echo $row->lname; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->mobile; ?></td>
                    <td><button type="submit" class="btn btn-info editdetails" id="edit" name="edit">Update</button></td>
                    <td><button type="submit" class="btn btn-danger deletedetails" id="delete" name="delete">Delete</button></td>
                  </tr>
                <?php } ?>
                </tbody>

                <p><?php echo $links; ?></p> 
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter your Mobile Number">
            <p id="mobileav" style="color: red"></p>
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

      <form action="deletedetails" method="POST" id="deleteform">

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


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable007");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script type="text/javascript">
  
  $(document).ready(function()
  {

    $(".message").fadeOut(5000);


    $('.editdetails').click(function()
    {
      $("#mymodal").modal('show');
      $("#mymodal").find('.modal-title').text('Update Form');
      $("#save").html("Update");
      $("#myform").attr('action','updatedetails');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function()
      {
        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#fname').val(data[1]);
      $('#lname').val(data[2]);
      $('#email').val(data[3]);
      $('#mobile').val(data[4]);

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
      $("#mymodal").modal('show');
      $("#myform").attr('action','savedetails')
      $("#mymodal").find('.modal-title').text('Registration From');
      $("#save").html("Save");

    });


    $("#mobile").keyup(function(){


      $.ajax({
        url: "<?php echo base_url('admin/checkmobile'); ?>",
        method: "POST",
        data: {mobile:$("#mobile").val()},
        success: function(data)
        {
          $('#mobileav').html(data);
        },
        error: function() 
        {
          
        }

      });


    });


    $('#mymodal').on('hidden.bs.modal', function (e) {
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


      $('#dataTable00').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


  });


</script>
