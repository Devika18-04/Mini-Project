<?php
    require('../inc/dbconfig.php');
    require('../inc/essentials.php');
    adminLogin();
    
    if(isset($_POST['get_bookings'])){
        $frm_data=filteration($_POST);

        $limit=10;
        $page=$frm_data['page'];
        $start = ($page-1)*$limit;

       /* $query="SELECT bo.*,bd.* FROM `booking_order` bo
            INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id
            WHERE (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
            AND (bo.booking_status= ? AND bo.arrival=?) ORDER BY bo.booking_id ASC";
        */

        $query="SELECT bo.*,bd.* FROM `booking_order` bo
            INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id
            WHERE ((bo.booking_status='booked' AND bo.arrival=1) 
            OR (bo.booking_status='cancelled' AND bo.refund=1)
            OR (bo.booking_status='payment failed'))
             ORDER BY bo.booking_id DESC";



        //$res=select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%","booked",0],'sssss');
       $res=mysqli_query($con,$query);
        $i=1;
        $table_data="";

        if(mysqli_num_rows($res)==0){
            echo"<b>No Data Found!</b>";
            exit;
        }

        while($data = mysqli_fetch_assoc($res)){
            $date=date("d-m-Y",strtotime($data['dateandtime']));
            $checkin=date("d-m-Y",strtotime($data['check_in']));
            $checkout=date("d-m-Y",strtotime($data['check_out']));
            $table_data="
                <tr>
                    <td>$i</td>
                    <td>
                        <span class='badge bg-primary'>
                            Order ID:$data[order_id]
                        </span>
                        <br>
                        <b>Name :</b>$data[user_name]
                        <br>
                        <b>Phone no :</b>$data[phonenum]
                    </td>
                    <td>
                        <b>Room :</b>$data[room_name]
                        <br>
                        <b>Price :</b>Rs.$data[price]
                    </td>
                    <td>
                        <b>Check in :</b>$checkin
                        <br>
                        <b>Check out :</b>$checkout
                        <br>
                        
                        <b>Date :</b>$date
                    </td>
                    <td>
                       $data[booking_status]


                    </td>
                    
                </tr>
            ";

            $i++;

            echo $table_data;

        }

        

    }

    if(isset($_POST['assign_room'])){
        $frm_data=filteration($_POST);

        $query="UPDATE `booking_order` bo INNER JOIN `booking_details` bd
            ON bo.booking_id=bd.booking_id SET bo.arrival=?,bd.room_no=?
            WHERE bo.booking_id=?";
        
        $values=[1,$frm_data['room_no'],$frm_data['booking_id']];
        $res=update($query,$values,'isi');// it will update 2 rows so it return 2

        echo ($res==2) ? 1 : 0;
    }    

    if(isset($_POST['cancel_booking']))
    {
        $frm_data=filteration($_POST);
        $query="UPDATE `booking_order` SET `booking_status`=?,`refund`=?`
            WHERE `booking_id`=?";
        
        $values=['cancelled',0,$frm_data['booking_id']];
        $res=update($query,$values,'sii'); 

        echo $res;


    }

?>