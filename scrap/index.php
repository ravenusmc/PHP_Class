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

                <label>Length of Loan:</label>
                <input type="text" name="loan_length"><br>

                <label>Interest Rate:</label>
                <input type="text" name="Interest Rate"><span>%</span><br>
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Loan"><br>
            </div>
        </form>

    </main>

</body>
</html>