
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Contact Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Jquery core -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  

    <title>Hello, world!</title>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="">Contact</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
          <a class="nav-link text-white" href="<?php echo base_url(); ?>login/logout">Log Out</a>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
	  	<br><br><br><br>
          <?php  
            if($this->uri->segment(2) == "inserted")  
            {  
              echo '<p class="text-success">Data Inserted</p>';  
            }  

            if($this->uri->segment(2) == "updated")  
            {  
              echo '<p class="text-success">Data Updated</p>';  
            }  
          ?>  

        <h1>Contact List</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newContactModal">
          New Contact
        </button><br><br>

	    	<!-- <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->
  
        <table class="table text-left">
          <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th colspan="2"></th>
            </tr>
          </thead>
          <tbody>

            <?php 
            
            if ($this->uri->segment(2) != 0) {
              $count = $this->uri->segment(2) + 1;
            }
            else{
              $count = 1;
            }

            // $count = 1;

            // if($fetch_data->num_rows() > 0)
            if($count > 0)
            {
              // foreach($fetch_data->result() as $row)
              foreach($fetch_data as $row)
              {
            ?>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $row->c_fname; ?></td>
                <td><?php echo $row->c_lname; ?></td>
                <td><?php echo $row->c_mobileNo; ?></td>
                <td><?php echo $row->c_email; ?></td>
                <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td> 
                <td><a href="<?php echo base_url(); ?>main/update_data/<?php echo $row->id; ?>" class="update_data" id="<?php echo $row->id; ?>">Edit</a></td> 
              </tr>
            <?php
              $count++;
              }
            }
            else{
            ?>
              <tr>
                  <td>No data found!</td>
              </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
        <p><?php echo $links; ?></p>

      </div>

    </main><!-- /.container -->

    <!-- Modal -->
    <?php
      if(isset($user_data))
      {
        echo "<script>
         $(document).ready(function(){
             $('#editContactModal').modal('show');
         });
         </script>";

        foreach($user_data->result() as $row)
        {
    ?>
    <form method="post" action="<?php echo base_url(); ?>main/form_validation">
      <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                  <label for="first-name" class="col-form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="<?php echo $row->c_fname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="last-name" class="col-form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" value="<?php echo $row->c_lname; ?>" required>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-form-label">Phone Number:</label>
                  <input type="text" class="form-control" name="phone_number" value="<?php echo $row->c_mobileNo; ?>" required>
                </div>
                <div class="form-group">
                  <label for="email" class="col-form-label">Email:</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $row->c_email; ?>" required>
                </div>
              
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url(); ?>main" class="btn btn-secondary">Close</a>
              <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
              <input type="submit" name="update" value="Save" class="btn btn-primary" />
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php
        }
      }
      else{
    ?>
    <form method="post" action="<?php echo base_url(); ?>main/form_validation">
      <div class="modal fade" id="newContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                  <label for="first-name" class="col-form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="form-group">
                  <label for="last-name" class="col-form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-form-label">Phone Number:</label>
                  <input type="text" class="form-control" name="phone_number" required>
                </div>
                <div class="form-group">
                  <label for="email" class="col-form-label">Email:</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="insert" value="Save" class="btn btn-primary" />
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php
      }
    ?>

    <script>  
      $(document).ready(function(){  
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                   window.location="<?php echo base_url(); ?>main/delete_data/"+id;    
                }
                else  
                {  
                  return false;  
                }  
           });  
      });  
    </script>  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
 