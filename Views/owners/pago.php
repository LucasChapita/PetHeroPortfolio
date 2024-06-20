
<html>
<head>
    <title>pagarelkeeper.html</title>
    <style>
        div {
            background-color: white;
            color: rgb(1, 48, 1);
            border: 2px solid rgb(189, 160, 1);
            width: 600px;
            height: 600px;
            padding: 10px;
        }

        h2 {
            color: black;
        }

        label {
            color: black;
        }
    </style>
</head>

<body>
    <center>

        <div>
            <img src="https://i.ibb.co/nQWWh1f/Solo-Travel-Guide-2.png" width="150" height="60" alt="Solo-Travel-Guide-2" border="0">
            <h2>Payment methods </h2>
            
            <label for="" name="dni">Enter ID:</label><br>
            <input type="text" name="dni" required><br><br>
            <label for="" name="cbu">Enter CBU: </label><br>
            <input type="text" name="cbu" required><br><br>
            <label for="" name="c">Enter Account Number </label><br>
            <input type="text" name="c" required><br><br>
            <label for="">Your amount to pay is <?php echo "$" . $montPay ?></label><br>
            <form action="<?php echo FRONT_ROOT . "Reserv/Simulated" ?>" method="POST">
            <center>
                    <input type="hidden" name="id" value="<?php echo $reservIdp; ?>">
                    <button type="submit" class="btn btn-primary ml-auto">Pay</button>
                </center>
            </form>
        </div>
    </center>
</body>

</html>