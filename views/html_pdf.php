<!DOCTYPE html>
<html>
<head>
<title>context2d auto-break</title>
<link rel="stylesheet" type="text/css" href="examples.css">
<style>
</style>
</head>
<body>
 <h3>INVOICE</h3>
	<div class="customers">
		  
			   <table border="1" style="border-collapse:collapse;">
					<tr>
						<td>Invoice Number </td>
						<td>345432 </td>
					</tr>
					<tr>
						<td>Client Name </td> 
						<td>Alfred D'souza</td>
					</tr>
					<tr>
						<td>Invoice Date</td>
						<td>23-04-2018</td>
					</tr>
					<tr>
						<td>Paid Date </td> 
						<td>23-04-2018</td>
					</tr>
					<tr>
						<td>Final Amount</td> 
						<td>10,00000</td>
					</tr>
					<tr>
						<td>Client Origin </td> 
						<td></td>
					</tr>
				</table>
		  
		</div>

	<script src='<?php echo base_url();?>assets/test_js/jspdf.debug.js'></script>
	<script src='<?php echo base_url();?>assets/test_js/html2pdf.js'></script>
	
	<script>
        var pdf 	  = new jsPDF('p', 'pt', 'letter');
        var canvas    = pdf.canvas;
        canvas.height = 60 * 15;
        canvas.width  = 50 * 15;
       // var width   = 400;

        document.body.style.width = 400 + 'px';

        html2pdf(document.body, pdf, function(pdf) {
                var iframe = document.createElement('iframe');
                iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');
                document.body.appendChild(iframe);
                iframe.src = pdf.output('datauristring');

               //var div = document.createElement('pre');
               //div.innerText=pdf.output();
               //document.body.appendChild(div);
			     pdf.save('Test.pdf');
            }
        );
    </script>
</body>
</html>
