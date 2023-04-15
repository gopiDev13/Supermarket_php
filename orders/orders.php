<?php
include "../employees/navemp.php";
include "../employees/sidebars.php";
include_once "dummy.php";
include "cus.php";



?>





<style>
    body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
    }
    body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content:counter(Serial); /* Display the counter */
}

    @media (min-width: 1200px) {
        .container-lg {
            max-width: 1500px !important;
        }
    }

    .table-wrapper {
        margin-top: 30px;
        margin-left: 225px !important;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }

    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }

    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }

    .table-title .add-new i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table th:last-child {
        width: 150px;
    }

    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 30px;
        height: 30px;
    }

    table.table td a.add {
        color: #27C46B;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }

    table.table td i {
        font-size: 16px;
    }

    table.table td a.add i {
        font-size: 16px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }

    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }

    table.table .form-control.error {
        border-color: #f50000;
    }

    table.table td .add {
        display: none;
    }

    table tbody tr td:last-child {
        display: flex;
    }
</style>
<script>
    $(document).ready(function() {


        $('#button_id').click(function() {
            $('tbody tr:last-child').clone().appendTo($('table'));
            $('tbody tr:last-child').find('select').val('');
            $('tbody tr:last-child').find('input').val('');
            $('tbody tr:last-child').find('.dis').val('');
            $('tbody tr:last-child').find('.afterdis').html('');
        });

    });

    $(document).on('change', '.s1', function() {
        var package = $(this).val();

        var current = $(this);


        $.ajax({
            type: 'POST',
            data: {
                package: package
            },
            url: 'price.php',
            success: function(data) {
                current.closest('tr').find('.prices').val(data);



                console.log(data);

            }
        });
    });
    $(document).on('input', '.qty', function() {

        var qty = $(this).val();

        var temp = $(this);

        var price = temp.closest('tr').find('.priceafter').val();
        var product_id=$(this).closest('tr').find('.s1').val();
        var amount = parseFloat(qty * price);

        temp.closest('tr').find('.amount').val(amount);

        calc_total();
        $.ajax ({
            type: 'POST',
            data: {
                qty:qty,
                product_id:product_id,
            },
            url: 'stocks.php',
            success: function(data) {
                var datas=JSON.parse(data);
              if(datas.status == 200){
              
                $.notify({
	// options
	title: '<strong>Success</strong>',
	message: "<br>"+ datas.message + "</strong></em>",
  icon: 'glyphicon glyphicon-ok',
	
},{
	// settings
	element: 'body',
	//position: null,
	type: "success",
	//allow_dismiss: true,
	//newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated fadeInDown',
		exit: 'animated fadeOutRight'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});

               }
             else if(datas.status == 205){
            //    elseif(datas.status == 205){
           $.notify({
	// options
	title: '<strong>Info</strong>',
	message: "<br>" + datas.message + "<br>",
    icon: 'glyphicon glyphicon-info-sign',
},{
	// settings
	element: 'body',
	position: null,
	type: "info",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated bounceInDown',
		exit: 'animated bounceOutUp'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}else if(datas.status == 204){
    $.notify({
	// options
	title: '<strong>Warning</strong>',
	message: "<br>"+datas.message+"<br>",
  icon: 'glyphicon glyphicon-warning-sign',
},{
	// settings
	element: 'body',
	position: null,
	type: "warning",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated bounceIn',
		exit: 'animated bounceOut'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});

}
            }
        })
    })
    //console.log(package);

    function deleteRows() {
        var table = document.getElementById('tbody_id');
        var rowCount = table.rows.length;
        if (rowCount > '1') {
            var row = table.deleteRow(rowCount - 1);
            rowCount--;
        } else {
            alert('There should be atleast one row');
        }
    }

    function calc_total() {
        var sum = 0;
        // var temp = $('#sum');
        var amount = $('.amount').val();
        // console.log(amount);
        $('.amount').each(function() {
            sum += parseFloat($(this).val());
            // console.log(sum);
        });
        $('#sum').val(sum);

    }


    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).on("keyup", ".flats", function() {

        var temp = $(this);

        var price = temp.closest('tr').find('.prices').val();
        var disc = $('.flats').val();
        if (disc != '' && price != '') {
            var amount = (parseInt(price)) - (parseInt(disc));

            temp.closest('tr').find('.priceafter').val(amount);
        }
        // } else {
        //     $('#sum').val(parseInt(amount));
        // }
    });
    $(document).on("keyup", ".percent", function() {
        var temp = $(this);
        var price = temp.closest('tr').find('.prices').val();
        var disc = $('.percent').val();
        var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
        var mult = price * dec; // gives the value for subtract from main value
        var discont = price - mult;
        temp.closest('tr').find('.priceafter').val(discont);
    });


   
    $(document).on('change', '.dis', function() {
        var temp = $(this).val();
        if (temp == "Percent") {
            $(this).closest('tr').find('.afterdis').html("<input type='number' name='dis[]' placeholder='Percent' class='percent' style='width:87px;'>");
        } else if (temp == "Flat") {
            $(this).closest('tr').find('.afterdis').html("<input type='number' name='dis[]' placeholder='Flat' class='flats' style='width:87px;'> ");
        } else if (temp == "None") {
            var price = $(this).closest('tr').find('.prices').val();
            $(this).closest('tr').find('.priceafter').val(price);
            $(this).closest('tr').find('.afterdis').html("<input type='number' name='dis[]' placeholder='None' value='0' readonly style='width:87px;'> ");
        }
    })
</script>

<body>
    <form action="submit.php" method="POST" enctype="multipart/form-data">
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Order <b>Page</b></h2>
                            </div>

                            <div class="col-sm-8">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-left:511px;">Add Customer</button>

                            </div>
                            <div class="col-sm-4">

                                <!-- <input type="text" name="customer_name" class="cus"> -->
                                <select class="js-example-basic-single" name="customer">
                                    <option value="">search</option>
                                    <?php
                                    foreach ($cus_details as $cus) {

                                        echo '<option value="' . $cus['id'] . '">
                                ' . $cus['number'] . '</option>';
                                    }

                                    ?>


                                </select>

                                <!-- <a herf="../customer/addcustomer.php" ><button type="button" class="btn btn-info add-new">Add Customer</button></a> -->
                                <button type="button" id="button_id" class="btn btn-info add-new">Add New</button>

                            </div>

                        </div>
                    </div>
                    <table class="table table-bordered" id="products_table">
                        <thead>
                            <tr>


                                <th>S.No</th>


                                <th>Product</th>
                                <th>Per Product Price</th>
                                <th>Discount Type</th>
                                <th>Discount</th>
                                <th>After Discount</th>
                                <th>Quantity</th>

                                <th>Total price</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_id">
                            <tr>
                                <td></td>
                                <td>

                                    <select name="products[]" class="s1" style="width:87px;">
                                        <option value="">Select</option>


                                        <?php
                                        while ($pro = mysqli_fetch_array(
                                            $pro_details,
                                            MYSQLI_ASSOC
                                        )) {

                                            echo  "<option value= " . $pro['id'] . ">"
                                                . $pro["product_name"] . "</option>";
                                        }

                                        echo "</select>";
                                        ?>


                                <td><input type="number" class="prices" name="per" style="width:87px;" readonly></td>
                                <td><select name="discount[]" class="dis" style="width:87px;">
                                        <option value="">Select</option>
                                        <option value="None">None</option>
                                        <option value="Flat">Flat</option>
                                        <option value="Percent">Percent</option>
                                    </select>
                                </td>
                                <td class="afterdis"></td>
                                <td><input type="number" name="disprice[]" class="priceafter" style="width:87px;" readonly></td>
                                <td><input type="number" class="qty" name="quantity[]" style="width:87px;"></td>



                                <td><input type="number" name="totprice[]" class="amount" style="width:87px;" readonly></td>

                                <td><button type="button" class="btn btn-info delete" onclick="deleteRows()">Delete</button></td>
                                <input type="hidden" name="serial[]" class="sl" id="hd" value="1">

                            </tr>

                            <!-- <th colspan="2" style="text-align:right">Total:</th>
                        <th colspan="2" style="text-align:center"><span id="sum"></span></th> -->

                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <td colspan="2" style="text-align:center"><input type="text" id="sum" name="total" readonly></td>

                        </tfoot>
                    </table>
                    <input type="submit" class="btn btn-info add-new" value="Submit" name="submit" style="margin-left:800px;">
                </div>
    </form>
   



</body>

</html>