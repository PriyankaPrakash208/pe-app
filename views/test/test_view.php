<html>
	<head>
		<title>PDF</title>
	</head>
	<body>
		
		<canvas id="canvas"></canvas>

		<div id="thehtml" style="display: none;">
			<h2 style="color:green;">Test pdf conversion</h2>
		</div>
		
		

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/rasterizehtml/1.3.0/rasterizeHTML.allinone.js"></script>
		<script type="text/javascript">
			/**
 * jsPDF addHTML PlugIn
 * Copyright (c) 2014 Diego Casorran
 *
 * Licensed under the MIT License.
 * http://opensource.org/licenses/mit-license
 */
	var doc        = new jsPDF();
(function (jsPDFAPI) {
	'use strict';
	/**
	 * Renders an HTML element to canvas object which added to the PDF
	 *
	 * This feature requires [html2canvas](https://github.com/niklasvh/html2canvas)
	 * or [rasterizeHTML](https://github.com/cburgmer/rasterizeHTML.js)
	 *
	 * @returns {jsPDF}
	 * @name addHTML
	 * @param element {Mixed} HTML Element, or anything supported by html2canvas.
	 * @param x {Number} starting X coordinate in jsPDF instance's declared units.
	 * @param y {Number} starting Y coordinate in jsPDF instance's declared units.
	 * @param options {Object} Additional options, check the code below.
	 * @param callback {Function} to call when the rendering has finished.
	 * NOTE: Every parameter is optional except 'element' and 'callback', in such
	 *       case the image is positioned at 0x0 covering the whole PDF document
	 *       size. Ie, to easily take screenshots of webpages saving them to PDF.
	 * @deprecated This is being replace with a vector-supporting API. See
	 * [this link](https://cdn.rawgit.com/MrRio/jsPDF/master/examples/html2pdf/showcase_supported_html.html)
	 */
	
	
	jsPDFAPI.addHTML = function (element, x, y, options, callback) {
		'use strict';
		if(typeof html2canvas === 'undefined' && typeof rasterizeHTML === 'undefined')
			throw new Error('You need either '
				+'https://github.com/niklasvh/html2canvas'
				+' or https://github.com/cburgmer/rasterizeHTML.js');
		if(typeof x !== 'number') {
			options = x;
			callback = y;
		}
		if(typeof options === 'function') {
			callback = options;
			options = null;
		}
		var I = this.internal, K = I.scaleFactor, W = I.pageSize.width, H = I.pageSize.height;
		options = options || {};
		options.onrendered = function(obj) {
			x = parseInt(x) || 0;
			y = parseInt(y) || 0;
			var dim = options.dim || {};
			var h = dim.h || 0;
			var w = dim.w || Math.min(W,obj.width/K) - x;
			var format = 'JPEG';
			if(options.format)
				format = options.format;
			if(obj.height > H && options.pagesplit) {
				var crop = function() {
					var cy = 0;
					while(1) {
						var canvas = document.createElement('canvas');
						canvas.width = Math.min(W*K,obj.width);
						canvas.height = Math.min(H*K,obj.height-cy);
						var ctx = canvas.getContext('2d');
						ctx.drawImage(obj,0,cy,obj.width,canvas.height,0,0,canvas.width,canvas.height);
						var args = [canvas, x,cy?0:y,canvas.width/K,canvas.height/K, format,null,'SLOW'];
						this.addImage.apply(this, args);
						cy += canvas.height;
						if(cy >= obj.height) break;
						this.addPage();
					}
					callback(w,cy,null,args);
				}.bind(this);
				if(obj.nodeName === 'CANVAS') {
					var img = new Image();
					img.onload = crop;
					img.src = obj.toDataURL("image/png");
					obj = img;
				} else {
					crop();
				}
			} else {
				var alias = Math.random().toString(35);
				var args = [obj, x,y,w,h, format,alias,'SLOW'];
				this.addImage.apply(this, args);
				callback(w,h,alias,args);
			}
		}.bind(this);
		if(typeof html2canvas !== 'undefined' && !options.rstz) {
			return html2canvas(element, options);
		}
		if(typeof rasterizeHTML !== 'undefined') {
			var meth = 'drawDocument';
			if(typeof element === 'string') {
				meth = /^http/.test(element) ? 'drawURL' : 'drawHTML';
			}
			options.width = options.width || (W*K);
			return rasterizeHTML[meth](element, void 0, options).then(function(r) {
				options.onrendered(r.image);
			}, function(e) {
				callback(null,e);
			});
		}
		return null;
	};
})(jsPDF.API);
			
		    var canvas     = document.getElementById("canvas"),
			html_container = document.getElementById("thehtml"),
    		html           = html_container.innerHTML;
//			final          = String(rasterizeHTML.drawHTML(html,canvas));
			final          = rasterizeHTML.drawHTML(html,canvas);
			
//			rasterizeHTML.drawHTML(html, canvas)
//    		.then(function success(renderResult) {
//				doc.save('save.pdf');
//    		}, function error(e) {
//              alert('Error');
//			});
			

//			doc.text(10, 10, final);
////			doc.autoPrint()
//			doc.save('save.pdf');	doc.text(10, 10, final);
////			doc.autoPrint()
//			doc.save('save.pdf');
			
			//

		
		</script>
	</body>
</html>