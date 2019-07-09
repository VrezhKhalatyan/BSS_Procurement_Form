<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SYSTEMS REQUEST BUREAU OF STREET SERVICES DEPARTMENT OF PUBLIC WORKS</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js"></script>

    <!-- Including jQuery is required. -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Including our scripting file. -->
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/EditableTable.js"></script>
    <!-- Including CSS file. -->
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">

    <link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <script>
        $(document).ready(function () {
            load_data();

            function load_data(query) {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search').keyup(function () {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script> -->

    <style type="text/css">
        .inputControl {
            border-style: inset;
            border-width: 7px;
            border-color: #7B83C1;
        }

        h2.centerh2 {
            text-align: center;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            /* width: 50%; */
        }

        .background {
            background-color: #FAF8EA;
        }

        .line {
            height: 12px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }

        .EditableForm {
            margin: 20px 0;
        }

        .EditableForm input,
        .EditableForm button {
            padding: 5px;
        }

        .EditableTable {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .EditableTable,
        .EditableTable th,
        .EditableTable td {
            border: 1px solid blue;
        }

        .EditableTable th,
        table td {
            padding: 10px;
            text-align: left;
        }

        .search-box {
            width: 700px;
            position: relative;
            display: inline-block;
            font-size: 14px;
            margin: auto;
        }

        .search-box input[type="text"] {
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }

        .result {
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
        }

        .search-box input[type="text"],
        .result {
            width: 100%;
            box-sizing: border-box;
        }

        /* Formatting result items */
        .result p {
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
        }

        .result p:hover {
            background: #f2f2f2;
        }
    </style>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let sum = 0;
            $(".add-row").click(function () {
                var id = $("#id").val();
                var productDescription = $("#productDescription").val();
                var qty = $("#qty").val();
                var unitCost = $("#unitCost").val();
                var totalCost = $("#totalCost").val();
                sum = sum + parseInt(totalCost);
                // sum = parseInt(sum);
                var markup =
                    "<tr><td><input type='checkbox' name='record'></td><td id='ID' name='ID'>" + id +
                    "</td><td id='ProductDescription' name='ProductDescription'>" + productDescription +
                    "</td><td id='Qty' name='Qty'>" + qty + "</td><td id='UnitCost' name='UnitCost'>" +
                    unitCost +
                    "</td><td id='TotalCost' name='TotalCost'>" + totalCost + "</td></tr>";
                $.ajax({
                    url: 'insert.php',
                    method: 'POST',
                    data: {
                        productDescription: productDescription,
                        qty: qty,
                        unitCost: unitCost,
                        totalCost: totalCost
                    },
                    success: function (data) {
                        alert("Data sent to MySQL");
                    }
                });
                $(".EditableTable").append(markup);
                document.getElementById("PicExtPrice").value = sum;

            });

            // Find and remove selected table rows
            $(".delete-row").click(function () {
                $("table tbody").find('input[name="record"]').each(function () {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                        document.getElementById("PicExtPrice").value = 0;
                        // // sql to delete a record
                        // $sql = "DELETE FROM product WHERE id=3";

                        // if ($conn - > query($sql) === TRUE) {
                        //     echo "Record deleted successfully";
                        // } else {
                        //     echo "Error deleting record: ".$conn - > error;
                        // }
                    }
                });
            });
        });
    </script>
    <!--<SCRIPT language="javascript">
        document.designMode = 'on';
    </SCRIPT>-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("backend-search.php", {
                        term: inputVal
                    }).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                // $result = $(this).parent(".result")
                // list($id, $productDescription, $qty, $unitCost, $totalCost) = split('[ ]', $result);
                $(this).parent(".result").empty();

            });
        });

        function getData() {
            var data = document.getElementById("myData").value;
            // alert(data);
            let list = data.split("/");
            var id = list[0];
            var pd = list[1];
            var qty = list[2];
            var uCost = list[3];
            var total = list[4];

            // var id = data.substr(0, data.indexOf(' '));
            // var pd = data.substr(data.indexOf(' ')+1);
            // var pd1 = pd.substr(0, pd.indexOf('/'));
            // var qty = pd.substr(1, pd.indexOf('/'));
            // var qty = pd.split("/");
            // var qty1 = 


            document.getElementById("id").value = id;
            document.getElementById("productDescription").value = pd;
            document.getElementById("qty").value = qty;
            document.getElementById("unitCost").value = uCost;
            document.getElementById("totalCost").value = total;

            // document.getElementById("productDescription").value = pd1;
            // document.getElementById("qty").value = pd;
        }
    </script>
    <script type="text/javascript">
        function calculatePrice(myform) {



        }
    </script>

</head>

<body>
    <div class="background">
        <span class="title">
            <img src="images/bss_logo_transparent.png" class="center" id="logo" width=200 height=200>
            <h2 class="centerh2" style="font-family:georgia,garamond; font-size:25px"><i>SYSTEMS REQUEST</i></h2>
            <h2 class="centerh2" style="font-family:georgia,garamond; font-size:25px"><i>BUREAU OF STREET SERVICES</i>
            </h2>
            <h2 class="centerh2" style="font-family:georgia,garamond; font-size:25px"><i>DEPARTMENT OF PUBLIC WORKS</i>
            </h2>
        </span>
        <hr class="line">

        <!-- First Section -->
        <?php
            $link = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($link, 'Procurement');
            $sql = "SELECT * FROM ORDERS";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        ?>

        <table align="center">
            <tr>
                <td><label class="labelAdjust">SYSTEMS REQ. NO.:</label></td>
                <td><label>ORDER TYPE:</label></td>
                <td><label>DATE PREPARED</label></td>
                <td><label>PREPARED BY:</label></td>
            </tr>

            <tr>

                <td>
                    <input class="inputControl" type="text" id="demo" onclick="myFunction()">
                </td>
                <td>
                    <?php
                echo "<select  class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" . $row['OrderType'] . "</option>";
                }
                echo "</select>";
                ?>
                </td>
                <td><input class="inputControl" type="date" id="today"></td>
                <td>
                    <?php
                $sql = "SELECT * FROM EMPLOYEE WHERE Division = 'Systems Section'";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                echo "<select class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" .  $row['FirstName']  . " " . $row['MiddleName'] . $row['LastName']. "</option>";
                }
                echo "</select>";
                ?>
                </td>


            </tr>
            <tr>
                <td><label>REQUESTING DIV:</label></td>
                <td><label>VENDOR:</label></td>
                <td><label>VENDOR CONTACT:</label></td>
            </tr>
            <tr>
                <td><select class="inputControl" type="text">
                        <option>ADM</option>
                        <option>ENG</option>
                        <option>EOS</option>
                        <option>EXEC</option>
                        <option>FMD</option>
                        <option>MSD</option>
                        <option>PMD</option>
                        <option>RMSS</option>
                        <option>RRD</option>
                    </select>
                </td>
                <td>
                    <?php
                $sql = "SELECT * FROM VENDOR";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                echo "<select class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" .  $row['VendorName']  . "</option>";
                }
                echo "</select>";
                ?>
                </td>
                <td>
                    <?php
                $sql = "SELECT * FROM VENDOR";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                echo "<select  class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" .  $row['ContactInfo']  . "</option>";
                }
                echo "</select>";
                ?>
                </td>
            </tr>
            <tr>
                <td><label>QUOTE NO.:</label></td>
                <td><label>QUOTE DATE:</label></td>
                <td><label>VOL DISC</label></td>
                <td><label>QUOTE AMOUNT:</label></td>
            </tr>
            <tr>
                <td><input class="inputControl" type="text"></td>
                <td><input class="inputControl" type="date" id="today"></td>
                <td><input class="inputControl" type="checkbox" name="checkbox1" value="1"></td>
                <td><input class="inputControl" type="text"></td>
            </tr>
        </table>
        <hr class="line">

        <!-- Second Section -->
        <table align="center">
            <tr>
                <td><label>REQUEST AND SHIPPING CONTACT: </label></td>
                <td>
                    <?php
                $sql = "SELECT * FROM Employee";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                echo "<select class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" .  $row['FirstName']  . " " . $row['MiddleName'] 
                    . $row['LastName']. ", ". $row['Role']. ", ". $row['Division']
                    . ", ". $row['PhoneNumber']. "</option>";
                }
                echo "</select>";
                ?>
                </td>

            </tr>
        </table>
        <h5 style="text-align: center;">SHIP TO: BUREAU OF STREET SERVICES, SYSTEMS SECTION, 1149 S. BROADWAY, ROOM 350,
            L. A., CA
            90015
        </h5>
        <hr class="line">

        <!-- Third Section -->
        <table align="center">
            <!-- <tr>
            <td><label>REQUEST:</label></td>
        </tr>
        <tr>
            <td><input class="inputControl" type="text"></td>
        </tr> -->
            <tr>
                <td><label style="text-align: left;">DESCRIPTION:</label></td>
            </tr>

            <!-- Search Bar -->
            <div class=" search-box inputControl">
                <input onclick="getData()" id="myData" type="text" autocomplete="off" placeholder="Search Product..."
                    class="center" />
                <div class="result"></div>
            </div>
            <br>
            <br>
            <!--Editable Table -->
            <form class="EditableForm">
                <!-- $text="<script>document.writeln(document.getElementById('exampleModalLabel').innerHTML);</script>"; -->
                <input type="text" id="id" name="id" placeholder="ID" class="inputControl">
                <input type="text" id="productDescription" name="productDescription" placeholder="Product Description"
                    class="inputControl">
                <input type="text" id="qty" name="qty" placeholder="Qty" class="inputControl">
                <input type="text" id="unitCost" name="unitCost" placeholder="Unit Cost" class="inputControl">
                <input type="text" id="totalCost" name="totalCost" placeholder="Total Cost" class="inputControl">
                <input type="button" class="add-row button button2" value="Add Row">
            </form>
            <table class="EditableTable" contenteditable='true'>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>ID</th>
                        <th>Product Description</th>
                        <th>Qty</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody id="dataTable">
                </tbody>
            </table>
            <button type="button" class="delete-row button button2">Delete Row</button>
            The New Calculated Total: $ <input id="PicExtPrice" type="text" Size=8 class="inputControl">
            <br>
            <br>
            <!-- <form action="insert.php" method="post">
                <input class="submit button button2" name="submit" type="submit" value="Insert into MySQL">
            </form> -->
        </table>
        <hr class="line">

        <!-- Fourth Section -->
        <table align="center">
            <tr>
                <td><label>SYSTEMS REQ. APPROVED BY:</label></td>
                <td><label>DATE:</label></td>
                <td><label>REQUESTER:</label></td>
                <!--<td><label>DATE:</label></td> -->
            </tr>
            <tr>
                <td><input class="inputControl" type="text"></td>
                <td><input class="inputControl" type="date" id="today"></td>
                <td><input class="inputControl" type="text"></td>
                <!--<td><input class="inputControl" type="date" id="today"></td>-->
            </tr>
            <tr>
                <td><label>DATE:</label></td>
            </tr>
            <tr>
                <td><input class="inputControl" type="date" id="today"></td>
            </tr>
            <tr>
                <td><label>REQUEST APPROVED BY: (IF APPLICABLE)</label></td>
                <td><label>DATE:</label></td>
                <td><label>SYSTEMS REQ. NO.:</label></td>
            </tr>
            <tr>
                <td><input class="inputControl" type="text"></td>
                <td><input class="inputControl" type="date" id="today"></td>
                <td>
                    <?php
                $sql = "SELECT * FROM Employee WHERE Division is NULL";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                echo "<select class='inputControl' name='id'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option>" .  $row['FirstName']  . " " . $row['MiddleName'] 
                    . $row['LastName']. ", ". $row['Role']. "</option>";
                }
                echo "</select>";
                ?>
                </td>
                <td><input class="inputControl" type="text"></td>
            </tr>
        </table>
        <hr class="line">

        <!-- Fifth Section -->
        <center>
            <h3 style="text-align:center;">--- FOR FMD USE ONLY--- </h3>
            <tr>
                <td><label>AVAILABILITY OF FUNDS CONFIRMED BY:</label></td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><label>DATE:</label></td>

            </tr>
            <br>
            <tr>
                <td><input class="inputControl" type="text"></td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><input class="inputControl" type="date" id="today"></td>
            </tr>
            <tr>
                <td>
                    <h4 class="center">TO FMD:</h4>
                </td>
                <td>
                    <h4>
                        PLEASE ENTER PURCHASE ORDER DATE, PURCHASE ORDER NO., AND TOTAL COST BELOW, AND PROVIDE SYSTEMS
                        WITH
                        PURCHASE ORDER INFO.
                    </h4>
                </td>
            </tr>
            <tr>
                <td><label>P.O. DATE:</label></td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><label>P.O. NO:</label></td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><label>TOTAL COST:</label></td>
            </tr>
            <br>
            <tr>
                <td><input class="inputControl" type="date" id="today"></td>
                <td><input class="inputControl" type="text"></td>
                <td><input class="inputControl" type="text"></td>
            </tr>
        </center>
        <hr class="line">

        <!-- Sixth Section -->
        <table align="center">
            <h4 style="text-align:center;">TO ITS:</h4>
            <h4 style="text-align:center;">
                PLEASE ENTER MMS W.O. NO., ACCOUNT NO., ORG NO., AND TASK NO.
            </h4>
            <tr>
                <td><label>MMS W.O. NO.:</label></td>
                <td> <label>ACCOUNT NO.:</label></td>
                <td><label>ORG. NO.:</label></td>
                <td> <label>TASK NO.:</label></td>
            </tr>
            <tr>
                <td><select class="inputControl" type="text">
                        <option>M0101010</option>
                    </select>
                </td>
                <td><select class="inputControl" type="text">
                        <option>6010</option>
                    </select>
                </td>
                <td><select class="inputControl" type="text">
                        <option>860M0000</option>
                    </select>
                </td>
                <td><select class="inputControl" type="text">
                        <option>IND</option>
                    </select>
                </td>
            </tr>
        </table>
        <hr class="line">

        <!-- Seventh Section -->
        <table align="center">
            <tr>
                <td>
                    <h4 style="text-align:center;">COMMENTS:</h4>
                </td>
            </tr>
            <tr>
                <td><textarea class="inputControl" name="message" placeholder="Your message
                            here..."></textarea></td>
            </tr>
        </table>

        <div>
            <h4 style="text-align:center;">
                PRForm Updated: 06/13/2019 Prepared by Vrezh Khalatyan
            </h4>
        </div>
    </div>
</body>

</html>