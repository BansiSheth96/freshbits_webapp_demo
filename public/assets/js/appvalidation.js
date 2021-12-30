$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='add_category_form']").validate({
    // Specify validation rules
    rules: {
     
      category_name: "required",
      
      
    },
    // Specify validation error messages
    messages: {
      category_name: "Please enter your firstname",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
