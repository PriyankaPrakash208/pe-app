<html>
	<head>
		<title>PDF</title>
	</head>
	<body>
	<!--		test-->
<div id="customers">
   <b>This is a bold text</b>
   <i>italics</i>
    <table id="tab_customers" class="table table-striped">
        <colgroup>
            <col width="20%">
                <col width="20%">
                    <col width="20%">
                        <col width="20%">
        </colgroup>
        <thead>
            <tr class='warning'>
                <th>Country</th>
                <th>Population</th>
                <th>Date</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Chinna</td>
                <td>1,363,480,000</td>
                <td>March 24, 2014</td>
                <td>19.1</td>
            </tr>
            <tr>
                <td>India</td>
                <td>1,241,900,000</td>
                <td>March 24, 2014</td>
                <td>17.4</td>
            </tr>
            <tr>
                <td>United States</td>
                <td>317,746,000</td>
                <td>March 24, 2014</td>
                <td>4.44</td>
            </tr>
            <tr>
                <td>Indonesia</td>
                <td>249,866,000</td>
                <td>July 1, 2013</td>
                <td>3.49</td>
            </tr>
            <tr>
                <td>Brazil</td>
                <td>201,032,714</td>
                <td>July 1, 2013</td>
                <td>2.81</td>
            </tr>
        </tbody>
    </table>
</div>

<button onclick="javascript:demoFromHTML();">PDF</button>
<!--		test-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	<script>
	function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#customers')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Test.pdf');
    }, margins);
}	
    
	</script>
		
		</script>
	</body>
</html>