function submitForm(btn) {
		// btn.preventDefault();
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }