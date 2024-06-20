<head>
    <style>
        .tabla {
            font-size: 18px;
            text-align: center;
        }

        .bd {
            border: 3px solid black;
        }

        .tabla2 {
            width: 350px;
        }

        td {
            font-size: 9px;
            width: 175px;
        }

        .tabla3 {
            width: 350px;
            text-align: center;
        }

        .mc {
            width: 10px;
        }

        .t {
            font-size: 12px;
            width: 150;
        }

        div {
            border: 2px solid green;
            width: 350px;
            height: 50px;
            float: left;
            margin: 3px;
        }

        strong {
            font-size: 15px;
        }

        h1 {
            background-color: green;
            color: white;
            text-align: right;
            font-size: 22px;
        }

        h2 {
            background-color: saddlebrown;
            color: antiquewhite;
            text-align: left;
            font-size: 22px;
        }

        h5 {
            font-size: 18px;
            background-color: brown;
            color: antiquewhite;
        }

        span {
            width: 175;
            height: 25;
            float: left;
        }

        .spandex2 {
            border: 1px solid black;
            width: 0px;
            height: 40px;
        }

        .spandex3 {
            background-color: white;
            margin: 2px;
            border: 3px solid rgb(152, 207, 177);
            width: 360px;
            height: 535px;
        }

        h3 {
            font-size: 20px;
        }

        .h31 {
            font-size: 14px;
            width: 350;
            text-align: right;
        }

        .td1 {
            font-size: 22px;
            text-align: left;
            width: 350px;
        }

        .td2 {
            font-size: 22px;
            text-align: right;
            width: 350px;
        }

        body {

            border: 1px solid black;
            color: black;
        }

        .spandex4 {
            margin: 0px;
            padding: 0px;
            border: 1.5px solid black;
            width: 350;
            height: 0px;
        }
    </style>
</head>

<main>

    <body>
        <form action="<?php echo FRONT_ROOT . "Reserv/ShowPay" ?>" method="POST">

            <span class="spandex3">

                <span>
                    <h2>Pet Hero</h2>
                </span>
                <span>
                    <h1>Payment coupon</h1>
                </span>
                <table class="tabla">
                    <tr>
                        <td class="td1">
                            <strong><?php echo "N° " . rand(); ?></strong>
                        </td>
                        <td style="text-align: center;">
                            <img src="https://i.ibb.co/nQWWh1f/Solo-Travel-Guide-2.png" width="150" height="60" alt="Solo-Travel-Guide-2" border="0">
                        </td>
                        <td>
                            <h7><?php echo date("Y-m-d"); ?></h7>
                        </td>
                    </tr>
                </table>
                <div>
                    <table class="tabla3">
                        <tr>
                            <td>1st expiration</td>
                            <td class="mc" rowspan="3"><span class="spandex2"></span></td>
                            <td>importe</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo date("Y-m-d", strtotime("+ 15 days")); ?></strong></td>
                            <td><strong><?php echo "$" . $monto ?></strong></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <table class="tabla3">
                        <tr>
                            <td>2nd expiration- 10% surcharge</td>
                            <td class="mc" rowspan="2"><span class="spandex2"></span>
                            <td>importe</td>
                        </tr>
                        <tr>
                            <td><strong><?php echo date("Y-m-d", strtotime("+ 30 days")); ?></strong></td>
                            <td><strong><?php echo "$" . $vencimiento ?></strong></td>
                        </tr>
                    </table>
                </div>

                <table class="tabla2">
                    <tr>
                        <td colspan="3" class="t">Owner's data</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $userOwner->getTypeUserOwner()->getName() ?></td>
                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td><?php echo $userOwner->getTypeUserOwner()->getSurName() ?></td>
                    </tr>
                    <tr>
                        <td>DNI</td>
                        <td><?php echo $userOwner->getTypeUserOwner()->getDNI() ?></td>
                    </tr>
                </table>
                <hr class="spandex4" />
                <table class="tabla2">
                    <tr>
                        <td colspan="3" class="t">Keeper´s data</td>
                    </tr>
                    <tr>
                        <td>keeper</td>
                        <td><?php echo $userKeeper->getTypeUserKeeper()->getName() . " " . $userKeeper->getTypeUserKeeper()->getLastName() ?></td>
                    </tr>
                    <tr>
                        <td>Tuition</td>
                        <td><?php echo $userKeeper->getTypeUserKeeper()->getTuition() ?></td>
                    </tr>
                </table>
                <hr class="spandex4" />
                <table class="tabla2">
                    <tr>
                        <td colspan="3" class="t">Pet´s Data</td>
                    </tr>
                    <tr>
                        <td>Pet´s name</td>
                        <td><?php echo $pet->getName() ?></td>
                    </tr>
                    <tr>
                        <td>Pet´s Race</td>
                        <td><?php echo $pet->getRace() ?></td>
                    </tr>
                </table>
                <hr class="spandex4" />
                <table class="tabla2">
                    <tr>
                        <td colspan="2" class="t">Details of payment</td>
                    </tr>
                    <tr>
                        <td>Price per pet size</td>
                        <td><?php echo "$" . $userKeeper->getTypeUserKeeper()->getPrice() ?></td>
                    </tr>
                    <tr>
                        <td>Number of days</td>
                        <td><?php echo $days; ?></td>
                    </tr>
                    <tr>
                        <td>Date start</td>
                        <td><?php echo $reserv->getDateStart() ?></td>
                    </tr>
                    <tr>
                        <td>Date finish</td>
                        <td><?php echo $reserv->getDateFinish() ?></td>
                    </tr>
                    <tr>
                        <td>Amount payable</td>
                        <td><?php echo "$" . $monto ?></td>
                    </tr>
                    <tr>

                        <td>PAY COUPON</td>
                        <td>
                            <input type="hidden" name="monto" value="<?php echo $monto ?>">
                            <input type="hidden" name="id_Reserv" value="<?php echo $reservId ?>">
                            <button type="submit" class="btn btn-primary ml-auto d-block">Pay</button>
                        </td>
                    </tr>
                </table>
            </span>
        </form>
    </body>
</main>