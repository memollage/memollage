 $('#datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-27:+0",
        dateFormat: 'dd/mm/yy',
        defaultDate:"-27y-m-d" 
       // defaultDate: '1997/01/01'
        });
        
            jQuery('#datepicker-inline').datepicker();
  
            jQuery('#datepicker-multiple').datepicker({
              numberOfMonths: 3,
              showButtonPanel: true
            });
            
            jQuery('#colorpickerholder').ColorPicker({
		flat: true,
		onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
		}
	});
