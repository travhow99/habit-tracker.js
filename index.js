$(document).ready(function() {
  checkBoxes();


  $('.tracker-toggle').change(function(){

      // see if checked
      let $checkedLength = $(this).is(':checked');
      if ($checkedLength){
          //alert('checked');
      } else {
          //alert('unchecked');
      }

      let $habit = $(this).siblings('.habit-title').text();
      console.log($habit);

      let data = {
        // week in php
        // User id in php
        //name: '$habit',
        goal: 5,
        day: $(this).attr('for'),
        checked: +$checkedLength,
        category: 'default',
      }

      data.name = $habit;

      console.log(data);



    $.post('habit-form.php', data, function(data){


      // show the response
      $('#response').html(data);
        console.log(`${$checkedLength}`);
      }).fail(function() {

          // just in case posting your form failed
          alert( "Posting failed." );

      });
    });
});

function checkBoxes() {
  console.log('check');
  $('.active').prop('checked', true);
}
