<!DOCTYPE html>
<html>
<head>
  <title>Project</title>
  <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <header>


    </header>

    <main id='home_main'>

        <h1 class='center font'>Loan Calculator</h1>

        <div id='home_main_div'>

            <form action="results.php" method="post">
                <div id="data">
                    <label class='font'>Loan Amount: $</label>
                    <input type="text" name="loan_amount"><br>

                    <label class='font'>Interest Rate:</label>
                    <input type="text" name="interest_rate"><br>

                    <label class='font'>Length of Loan:</label>
                    <input type="text" name="loan_length"><br>

                    <label class='font'>Loan for Months or Years:</label><br>
                    <div class='type_field'>
                        <input type='radio' name='time_span' value='months' checked>Months<br>
                        <input type='radio' name='time_span' value='years'>Years 
                    </div>
                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input class='initial_btn' type="submit" value="Calculate Loan"><br>
                </div>
            </form>

        </div>

    </main>

    <hr>

    <footer>
        <p class="font copyright">
            &copy; <?php echo date("Y"); ?> Cuddy Loan Calculator, Inc.
        </p>
    </footer>

</body>
</html>