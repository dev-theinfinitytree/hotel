<?php 
foreach ($rooms as $room) {
    $room_no = $room->room_no;                  
}
?>
                    
<script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url();?>assets/dashboard/jqueryautocomplete/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dashboard/jqueryautocomplete/jquery.js"></script>
<link href="<?php echo base_url();?>assets/dashboard/jqueryautocomplete/jquery-ui.css" rel="stylesheet" type="text/css" />-->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
    $("#cust_name").keyup(function () {
		$('#DropdownCountry').show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>bookings/get_guest",
            data: {
                keyword: $("#cust_name").val()
            },
            dataType: "json",
            success: function (data) {
				
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#cust_name').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#cust_name').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="presentation" >' + value['g_name'] + '</li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li', function () {
        $('#cust_name').val($(this).text());
		$('#DropdownCountry').hide();
    });
});
</script>
<form id="f" action="<?php echo base_url();?>bookings/hotel_backend_create" method="post" style="padding:20px;">
            <h1>New Reservation</h1>
            <div class="form-wrap">
			   <label>Room:</label>
                <div class="form-content">
                <!--<select id="room_id" name="room_id">
                    <?php 
                        /*foreach ($rooms as $room) {
                            $selected = $resource == $room->room_id ? ' selected="selected"' : '';
                            $id = $room->room_id;
                            $name = $room->room_no;
                            print "<option value='$id' $selected>$name</option>";
                        }*/
                    ?>
                </select>-->
                 <?php echo $room_no; ?> 
				<input type="hidden" id="room_id" name="room_id" value="<?php echo $resource; ?>" />
            </div>
            </div> <!-- end form-wrap-->
            
            <div class="form-wrap">
                 <label>Customer Name: </label>
                 <div class="input-group"><input type="text" id="cust_name"  name="cust_name"  /></div>
                 
                 
                        
                        
             </div><!-- end form-wrap-->
			 <div class="form-wrap">
			  <ul class="dropdown-menu txtcountry" style="margin-left:20px;margin-right:0px;top:183px;" ropole="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
             </ul>
			 </div>
             <div class="form-wrap">
			    <label> Customer Address: </label>
                <div><textarea id="cust_address" name="cust_address"> </textarea></div>
            </div><!-- end form-wrap-->
            <div class="form-wrap">
			   <label> Contact Number: </label>
               <div><input type="text" id="cust_contact_no" name="cust_contact_no" value="" /></div>
            </div><!-- end form-wrap-->
            <div class="form-wrap">
                <label> Start:</label>
                <div><input type="text" id="cust_from_date" name="cust_from_date" value="<?php echo $start ?>" /></div>
            </div> <!-- end form-wrap-->
            <div class="form-wrap">
                <label> End: </label>
               <div><input type="text" id="cust_end_date" name="cust_end_date" value="<?php echo $end ?>" /></div>
             </div><!-- end form-wrap-->
          <div class="form-wrap">
            <label> Status:</label>
             <div>
			   <select id="cust_booking_status" name="cust_booking_status">
                    <?php 
                        $options = array("New", "Confirmed", "Arrived", "CheckedOut");
                        foreach ($options as $option) {
                            $selected = $option == $reservation['status'] ? ' selected="selected"' : '';
                            $id = $option;
                            $name = $option;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select> 
		    	</div>
            </div> <!-- end form-wrap-->
            <div class="form-wrap">
			  <label> Payment Amount:</label>
              <div><input type="text" id="cust_payment_initial" name="cust_payment_initial" value="" /></div>
            </div> <!-- end form-wrap-->
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
 

</script>

        <script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }
		
		
		
        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>