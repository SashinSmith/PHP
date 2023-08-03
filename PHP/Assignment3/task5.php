<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task5</title>
    </head>
    <body>
        <?php
        include 'menu.inc';
        ?>

        <br>
        <br>

        <h1>Table vendors</h1>
            <p1>This table represents all the vendors and information on the vendors.</p1>
        <h2>Primary Keys</h2>
            <p1>vendorID</p1>
        <h2>Foreign Keys</h2>
            <p1>defualtTermsID, defualtAccountNo</p1>
        <br>
        
        <h1>Table invoices</h1>
            <p1>This table represents all the invoices and all information involved with the invoices that are submitted to the vendors.</p1>
        <h2>Primary Keys</h2>
            <p1>invoiceID</p1>
        <h2>Foreign Keys</h2>
            <p1>termsID, vendorID</p1>
        <br>
        
        <h1>Table invoicesLineItems</h1>
            <p1>This table represents the line items used by the business.</p1>
        <h2>Primary Keys</h2>
            <p1>invoiceID, invoiceSequence</p1>
        <h2>Foreign Keys</h2>
            <p1>accountNo</p1>
        <br>
        
        <h1>Table terms</h1>
            <p1>This table represents the terms that vendors have agreed to and further information regarding the terms.</p1>
        <h2>Primary Keys</h2>
            <p1>termsID</p1>
        <h2>Foreign Keys</h2>
            <p1>None</p1>
        <br>
        
        <h1>Table generalLedgerAccounts</h1>
            <p1>This table represents the general accounts with account numbers and description for each.</p1>
        <h2>Primary Keys</h2>
            <p1>accountID</p1>
        <h2>Foreign Keys</h2>
            <p1>None</p1>
        <br>
    <br>
    <br>
    <iframe src="task5.txt" height="400" scrolling="yes" width="1200px">
        <p>Your browser does not support iframes.</p></iframe>
</body>

</html>