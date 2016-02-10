<?php 
    foreach ($rooms as $room) {                     
            $room_no = $room->room_no;
			$booking_id = $room->booking_id;
			$cust_name = $room->cust_name;
			$cust_address = $room->cust_address;
			$cust_contact_no = $room->cust_contact_no;
			$cust_from_date = $room->cust_from_date;
			$cust_end_date = $room->cust_end_date;
			$cust_booking_status = $room->cust_booking_status;
			$cust_payment_initial = $room->cust_payment_initial;
                 }
?>
<script src="<?php echo base_url();?>assets/dashboard/daypilot/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<form id="f" action="<?php echo base_url();?>bookings/hotel_backend_edit" method="post" style="padding:20px;">
            <h1>Edit Reservation</h1>
			<div>Room:</div>
            <div>
			
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
            <label><?php echo $room_no; ?></label>
				<input type="hidden" id="booking_id" name="booking_id" value="<?php echo $booking_id; ?>" />
            </div>
            <div>Customer Name: </div>
            <div><input type="text" id="cust_name" name="cust_name" value="<?php echo $cust_name; ?>" /></div>
			<div>Customer Address: </div>
            <div><textarea id="cust_address" name="cust_address">
			<?php echo $cust_address; ?>
			</textarea></div>
			<div>Contact Number: </div>
            <div><input type="text" id="cust_contact_no" name="cust_contact_no" value="<?php echo $cust_contact_no; ?>" /></div>
            <div>Start:</div>
            <div><input type="text" id="cust_from_date" name="cust_from_date" value="<?php echo $cust_from_date; ?>" /></div>
            <div>End:</div>
            <div><input type="text" id="cust_end_date" name="cust_end_date" value="<?php echo $cust_end_date; ?>" /></div>
            <div>Status:</div>
            <div><select id="cust_booking_status" name="cust_booking_status">
                    <?php 
                        $options = array("New", "Confirmed", "Arrived", "CheckedOut");
                        foreach ($options as $option) {
                            $selected = $option == $cust_booking_status ? ' selected="selected"' : '';
                            $id = $option;
                            $name = $option;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select></div>
			<div>Payment Amount:</div>
            <div><input type="text" id="cust_payment_initial" name="cust_payment_initial" value="<?php echo $cust_payment_initial; ?>" /></div>
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>-->
        
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