    <script src="js/mfgconfig.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script src="js/jxjcomm.js" type="text/javascript"></script>

	<script type="text/javascript">
        $$('div[id^=link]').each(function(item) {
            if (item.getProperty('id').substr(4, 1) != '2' && item.getProperty('id').substr(4, 1) != '_') {
                item.addEvents({
                    mouseover: function() {
                        item.setProperty('class', 'A_link' + item.getProperty('id').substr(4) + '1');
                    },
                    mouseout: function() {
                        item.setProperty('class', 'A_link' + item.getProperty('id').substr(4));
                    }
                });
            }
        });
        
    </script>
