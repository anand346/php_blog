</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<!-- <ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul> -->
	  </div>
	  <?php
                    $copyright_query = "SELECT * FROM tbl_footer WHERE id = 1";
                    $select_copyright = $db->select($copyright_query);
                    if ($select_copyright->num_rows > 0) {
                        $row_copyright = $select_copyright->fetch_assoc();
                    }
                    ?>
	  <p> &copy <?php echo $row_copyright['copyright'];?></p>
	</div>
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
<script>
var _0x5c31=['event','1867pUAekH','2XDGtBp','shiftKey','onkeypress','347NufcQQ','396053IqagXw','onmousedown','210094UZYfpc','keyCode','57237PBfSkJ','ctrlKey','charCodeAt','onkeydown','295972eRYTuT','452835NxdOCT','2wDFwAT','1tnWPal','653MoufMi'];var _0x11cf05=_0x4961;function _0x4961(_0x5a301b,_0x4a7b01){_0x5a301b=_0x5a301b-0x7e;var _0x5c31b4=_0x5c31[_0x5a301b];return _0x5c31b4;}(function(_0x439a23,_0x3e8184){var _0x113c5d=_0x4961;while(!![]){try{var _0x42f17e=-parseInt(_0x113c5d(0x8e))+-parseInt(_0x113c5d(0x87))+-parseInt(_0x113c5d(0x8f))*parseInt(_0x113c5d(0x80))+-parseInt(_0x113c5d(0x89))*-parseInt(_0x113c5d(0x81))+parseInt(_0x113c5d(0x84))*parseInt(_0x113c5d(0x7e))+parseInt(_0x113c5d(0x90))*parseInt(_0x113c5d(0x85))+parseInt(_0x113c5d(0x8d));if(_0x42f17e===_0x3e8184)break;else _0x439a23['push'](_0x439a23['shift']());}catch(_0x1822a5){_0x439a23['push'](_0x439a23['shift']());}}}(_0x5c31,0x5975b),document[_0x11cf05(0x8c)]=function(_0x4cf593){var _0x13dcc6=_0x11cf05;event=event||window[_0x13dcc6(0x7f)];if(event[_0x13dcc6(0x88)]==0x7b)return![];if(_0x4cf593[_0x13dcc6(0x8a)]&&_0x4cf593[_0x13dcc6(0x82)]&&_0x4cf593[_0x13dcc6(0x88)]=='I'[_0x13dcc6(0x8b)](0x0))return![];else{if(_0x4cf593[_0x13dcc6(0x8a)]&&_0x4cf593['shiftKey']&&_0x4cf593[_0x13dcc6(0x88)]=='J'['charCodeAt'](0x0))return![];else{if(_0x4cf593[_0x13dcc6(0x8a)]&&_0x4cf593[_0x13dcc6(0x88)]=='U'[_0x13dcc6(0x8b)](0x0))return![];}}},document[_0x11cf05(0x86)]=function(_0x5b4424){var _0x4fec9e=_0x11cf05;event=event||window['event'];if(event[_0x4fec9e(0x88)]==0x7b)return![];if(_0x5b4424[_0x4fec9e(0x8a)]&&_0x5b4424[_0x4fec9e(0x82)]&&_0x5b4424[_0x4fec9e(0x88)]=='I'[_0x4fec9e(0x8b)](0x0))return![];else{if(_0x5b4424[_0x4fec9e(0x8a)]&&_0x5b4424[_0x4fec9e(0x82)]&&_0x5b4424[_0x4fec9e(0x88)]=='J'[_0x4fec9e(0x8b)](0x0))return![];else{if(_0x5b4424['ctrlKey']&&_0x5b4424[_0x4fec9e(0x88)]=='U'[_0x4fec9e(0x8b)](0x0))return![];}}},document[_0x11cf05(0x83)]=function(_0x67bdaa){var _0x571f2f=_0x11cf05;event=event||window[_0x571f2f(0x7f)];if(event[_0x571f2f(0x88)]==0x7b)return![];if(_0x67bdaa['ctrlKey']&&_0x67bdaa[_0x571f2f(0x82)]&&_0x67bdaa[_0x571f2f(0x88)]=='I'[_0x571f2f(0x8b)](0x0))return![];else{if(_0x67bdaa[_0x571f2f(0x8a)]&&_0x67bdaa['shiftKey']&&_0x67bdaa[_0x571f2f(0x88)]=='J'[_0x571f2f(0x8b)](0x0))return![];else{if(_0x67bdaa[_0x571f2f(0x8a)]&&_0x67bdaa[_0x571f2f(0x88)]=='U'[_0x571f2f(0x8b)](0x0))return![];}}});
</script>
</body>
</html>