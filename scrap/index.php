<?php







?>
<!DOCTYPE html>
<html>
<head>
  <title>Project</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <main>

        <h1>Loan Calculator</h1>

        <form action="results.php" method="post">
            <div id="data">
                <label>Loan Amount:</label>
                <input type="text" name="loan_amount"><br>

                <label>Interest Rate:</label>
                <input type="text" name="interest_rate"><span>%</span><br>

                <label>Length of Loan:</label>
                <input type="text" name="loan_length"><br>

                <label>Loan for Months or Years:</label><br>
                <input type='radio' name='time_span' value='months' checked>Months<br>
                <input type='radio' name='time_span' value='years'>Years 
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Loan"><br>
            </div>
        </form>

    </main>

</body>
</html>