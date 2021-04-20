<?php require_once 'hedar.php';
require_once '../dbcon.php';
$sl = 0;

$query = "SELECT o.id as sid, u.fname, u.lname, u.phone, b.book_name, o.is_status status, o.delete_at, o.genarate_date FROM order_book o 
JOIN students u ON u.id = o.user_id
JOIN books b ON b.id = o.book_id
WHERE  o.delete_at is NULL ORDER BY o.id DESC";

?>
<table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>SL </th>
      <th>Name</th>
      <th>Mobile</th>
      <th>Book</th>
      <th>Genarate Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_object($result)) { ?>
        <tr>
          <td><?= ++$sl; ?></td>
          <td><?= $row->fname." ".$row->lname ?></td>
          <td><?= $row->phone; ?></td>
          <td><?= $row->book_name; ?></td>
          <td><?= date("d-m-Y",strtotime($row->genarate_date)); ?></td>
          <td>
            <?php if($row->status == 0):?>
              <button type="button" class="btn btn-warning btn-xs confrimbutton" data-sid="<?=$row->sid?>" style="margin-right: 5px;" >Confrim</button>
              <button type="button" class="btn btn-danger btn-xs rejectorder" data-sid="<?=$row->sid?>"  >Reject</button>
              <?php else: ?>
                <span class="label label-success" style="margin-left: 30px;padding: 5px">Confirmed</span>
              <?php endif;?>
            </td>
          </tr>
        <?php        }

      }
      ?>

    </tbody>

  </table>
  <script>
   $(document).ready(function () {
     $(".confrimbutton").click(function () {
       var id = $(this).data('sid');
       $.ajax({
         url:'order_confrim.php',
         type:'post',
         data:{sid:id},
         success:function (res) {
          if(res == 1){
            swal({
              title: "সফল",
              text: "সফলভাবে আপনার অর্ডারটি সম্পন্ন হয়েছে",
              icon: "success",
              button: false,
              timer:1500
            });
            setTimeout(function () {
              window.open('http://localhost/e-lms/librarin/book_order_list.php','_self');
            },1500);
          }

        }
      })

     })
     $(".rejectorder").click(function () {
       var id = $(this).data('sid');

       swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this imaginary file!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {

           $.ajax({
             url:'order_reject.php',
             type:'post',
             data:{sid:id},
             success:function (res) {
              console.log(res);
              if(res == 1){
               swal("Poof! Your imaginary file has been deleted!", {
                 icon: "success",
               });
               setTimeout(function () {
                 window.open('http://localhost/e-lms/librarin/book_order_list.php','_self');
               },1500);
             }

           }
         })


         }
       });



     })
   })
 </script>



 <?php require_once 'footer.php'; ?>



