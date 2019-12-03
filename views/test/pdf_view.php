<!DOCTYPE html>
<html>
<head>
<title>INVOICES</title>
<!--<link rel="stylesheet" type="text/css" href="examples.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/test_js/prettify.css">
<style>
</style>
</head>
<body>

	<div id="customers" style="width: 550px; font-size: 11px; padding:25px;font-family:Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;" >
		  
			   <table style="width: 550px;" border="0" style="border-collapse:collapse;">
					<tr>
					    <td >
					        <div>
					             <span style="float:left;"><b>HashRoot Solutions (P) Ltd</b></span><br/><br/>
					             <span style="float:left;">04846591616</span><br/>
					             <span style="float:left;">info@hashroot.com</span><br/>
					             <span style="float:left;">www.hashroot.com</span><br/><br/>
<!--					             <span style="float:left;">GSTIN: 32AADCH2247J1ZT</span><br/>-->
					        </div>
					    </td>
					     
						<td>
	<img style="width:15%;float:right;" src="<?php echo base_url();?>assets/img/test/hashroot--logo 1.png">
						</td>			
					</tr>
					<tr><td style="height:10px;"></td></tr>
					<tr>
					<td><span style="color:#7B9AD9;font-size: 20px;">Invoice</span></td>
						
						<td>
							
						</td>
					</tr>
					
					<tr>
						 <td style="font-weight: bolder">
						     <h5><span>INVOICE&nbsp;&nbsp;TO</span></h5><br/>
						      <div>
					    		<div style="float:left;">Client Name</div><br/>
					    		<div style="float:left;">Address</div><br/>
					    		<div style="float:left;">Country</div><br/>
					    		<div style="float:left;">State</div><br/>
					    	</div>
						 </td>
						 <td>
						 	<div>
								<br/><br/>
								<br/><br/>
								<div style="float:right;">
									<div style="float:left;"><b>INVOICE&nbsp;&nbsp;NO&nbsp;&nbsp;</b>
									<span>&nbsp; : #1sdeefdgfr</span></div>
									<br/>
									<div style="float:left;"><b>INVOICE&nbsp;&nbsp;DATE&nbsp;&nbsp;</b>
									<span> &nbsp;: 21-04-2018</span></div>
									<br/>
									<div style="float:left;"><b>PAID&nbsp;&nbsp;DATE&nbsp;&nbsp;</b>
									<span>&nbsp;: 23-04-2018</span></div>
								</div>
								<br/>
								
								
							</div>
						</td>
					</tr>
<!--
					<tr>
					    <td><br/><b>PLACE&nbsp;&nbsp;OF&nbsp;&nbsp;SUPPLY</b>
					    <br/>
					    <span>5</span>
					    </td>
						
					</tr>
-->
				
					<tr><td colspan="2"  style="height:30px;"></td></tr>
					
					<tr style="text-align: center;">
						<td colspan="2">
							<table border="0" style="width:100%;border-collapse:collapse;">
					<thead style="color:#fff;background-color:#A1A5D8;border-radius: 4px;">
						 <tr>
							 <th> 
								No :
							</th>
							<th>
								HSN / SAC
							</th>
							<th>
								ACTIVITY 
							</th>
							<th>
								QUANTITY
							</th>
							<th>
								RATE
							</th>
							<th>
								TAX
							</th>
							<th>
								AMOUNT
							</th>
						</tr>
					</thead>
					<tbody style="text-align: center;">
						<tr>
							
							<td>3</td>
							<td>992813</td>
							<td>activity</td>
							<td>4</td>
							<td>Rs.44333</td>
							<td>Rs.44</td>
							<td>Rs.44333</td>
						</tr>
						
					
					</tbody>
					
				</table>   
							
						</td>
						
					</tr>
					<tr><td style="height:20px;"></td></tr>
					
					<tr>
						<td></td>
						<td >
							<div>
								<div style="float:left;"><b>SUBTOTAL </b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> Rs.4000</div>
							</div>
						</td>
					</tr>
					 
<!--
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>SGST</b></div>
								<div style="margin-left: 100px;">:Rs.4000</div>
							</div>
						</td>
					</tr>
-->
				    <tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>SGST</b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> 9</div>
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>CGST</b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> 9</div>
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>IGST</b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> 18</div>
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>TOTAL </b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> total</div>
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>PAYMENT </b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> Rs.4000</div>
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div>
								<div style="float:left;"><b>BALANCE&nbsp;&nbsp;DUE</b>&nbsp;&nbsp;:</div>
								<div style="float:right;"> Rs.4000</div>
							</div>
						</td>
					</tr>
				</table>
		</div> 
		<br/>
		<div>
			<button onclick="javascript:demoFromHTML();">Download PDF</button>
		</div>
<!--		<script src='<?php //echo base_url();?>assets/test_js/jspd.js'></script>-->
	<script src='<?php echo base_url();?>assets/test_js/jspdf.debug.js'></script>
	<script src='<?php echo base_url();?>assets/test_js/html2pdf.js'></script>
<!--	<script src='<?php //echo base_url();?>assets/test_js/jspdf.min.js'></script>-->
	
	
	<script>
        var pdf 		= new jsPDF('p', 'pt', 'letter');
		
//      var pdf 		= new jsPDF('p', 'mm', [297, 210]);
		//settinf fonts
//		pdf.addPage();//To add new page
		
		//close setting fonts
        var canvas  	= pdf.canvas;
        canvas.height   = 72 * 11;
        canvas.width    = 72 * 8.5;
        canvas.margin   = 10 + 'px';
       // var width     = 400;
		  
//      pdf.addFont("times", "italic"); 
//		pdf.setFont('times','italic');
//		pdf.setFontStyle();
		pdf.addFont('helvetica', 'helvetica', 'normal');
		pdf.setFont('helvetica');
		pdf.setFontType("bold");
//		pdf.text(20, 50, 'This is helvetica bold.');
		
        document.body.style.width  = 800  + 'px';
//      document.body.style.height = 800 + 'px';
		function demoFromHTML(){ 
			html2pdf(document.getElementById('customers'), pdf, function(pdf) {
				
//				pdf.addFont('helvetica', 'helvetica', 'normal');
//				
//				pdf.setFont("helvetica");
//				pdf.setFontType("bold");
          //var iframe    = document.createElement('iframe');
//          iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');//Comment this if u dont want this to show
//        document.body.appendChild(iframe);//Comment this if u dont want this to show
         // iframe.src      = pdf.output('datauristring');

		   //var div = document.createElement('pre');//already commented
		   //div.innerText=pdf.output();//already commented
		   //document.body.appendChild(div);//already commented
			  pdf.save('Test.pdf');
            }
        );
		}
       
    </script>
</body>
</html>
